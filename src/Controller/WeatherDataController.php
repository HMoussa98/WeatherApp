<?php

namespace App\Controller;

use App\Entity\Notification;
use App\Entity\Weatherdata;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherDataController extends AbstractController
{
    private ManagerRegistry $doctrine;
    private LoggerInterface $logger;
    private int $postRequestCounter = 0;

    public function __construct(ManagerRegistry $doctrine, LoggerInterface $logger)
    {
        $this->doctrine = $doctrine;
        $this->logger = $logger;
    }

    #[Route('/postWeatherData', name: 'post_weather_data', methods: ['POST'])]
    #[Route('/postWeatherData', name: 'post_weather_data', methods: ['POST'])]
    public function postWeatherData(Request $request): Response
    {
        try {
            // Decode the JSON data from the request
            $jsonData = $request->getContent();
            $weatherDataArray = json_decode($jsonData, true);

            // Get the entity manager
            $entityManager = $this->doctrine->getManager();

            // Check if the weather data is in the expected format
            if ($weatherDataArray === null || !isset($weatherDataArray['WEATHERDATA']) || !is_array($weatherDataArray['WEATHERDATA'])) {
                return new Response('Invalid JSON data', Response::HTTP_BAD_REQUEST);
            }

            // Iterate over each weather record in the data and save it to the database
            foreach ($weatherDataArray['WEATHERDATA'] as $weatherRecordArray) {
                // Check for missing values and adjust temperature if necessary

                $weatherRecord = new Weatherdata();
                $weatherRecord->setSTN($weatherRecordArray['STN']);
                $weatherRecord->setDATE(new \DateTime($weatherRecordArray['DATE']));
                $weatherRecord->setTIME(new \DateTime($weatherRecordArray['TIME']));
                $weatherRecord->setTEMP($weatherRecordArray['TEMP']);
                $weatherRecord->setDEWP($weatherRecordArray['DEWP']);
                $weatherRecord->setSTP($weatherRecordArray['STP']);
                $weatherRecord->setSLP($weatherRecordArray['SLP']);
                $weatherRecord->setVISIB($weatherRecordArray['VISIB']);
                $weatherRecord->setWDSP($weatherRecordArray['WDSP']);
                $weatherRecord->setPRCP($weatherRecordArray['PRCP']);
                $weatherRecord->setSNDP(floatval($weatherRecordArray['SNDP']));
                $weatherRecord->setFRSHTT($weatherRecordArray['FRSHTT']);
                $weatherRecord->setCLDC($weatherRecordArray['CLDC']);
                $weatherRecord->setWNDDIR($weatherRecordArray['WNDDIR']);
                // Set other properties...

                // Persist the entity
                $entityManager->persist($weatherRecord);

                // Flush changes to the database
                $entityManager->flush();

                // Retrieve the ID of the newly persisted weather record
                $nextWeatherdataId = $weatherRecord->getId();

                // Check if temperature reading is unreal and create notification
                if (isset($weatherRecordArray['TEMP']) && $this->isTemperatureUnreal($weatherRecord)) {
                    $notification = new Notification();

                    $notification->setSTNID($weatherRecordArray['STN']);
                    $notification->setWEERID($nextWeatherdataId); // Use the retrieved ID
                    $notification->setDate($weatherRecord->getDATE());
                    $notification->setTime($weatherRecord->getTIME());
                    $notification->setErrorName('Unreal Temperature');
                    $notification->setDescription('The temperature reading is considered unreal.');
                    $notification->setStatus('Niet opgelost');

                    // Persist the notification
                    $entityManager->persist($notification);
                }
            }

            // Flush changes to the database
            $entityManager->flush();

            return new Response('Weather data successfully received and saved to the database', Response::HTTP_OK);
        } catch (\Exception $e) {
            // Log any errors
            $this->logger->error('Error occurred while saving weather data: ' . $e->getMessage());

            // Return an error response
            return new Response('An error occurred while saving weather data.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    private function getLastThirtyTemperatures($stationName): array
    {

        // Fetch the last 5 temperature readings for the given station name
        $repository = $this->doctrine->getRepository(Weatherdata::class);
        $lastThirtyTemperatures = $repository->findBy(
            ['STN' => $stationName],
            ['DATE' => 'DESC', 'TIME' => 'DESC'],
            2 // Limit to 2 records
        );

        // Extract temperatures from the fetched records
        $temperatures = [];
        foreach ($lastThirtyTemperatures as $weatherRecord) {
            $temperatures[] = $weatherRecord->getTEMP();
        }

        return $temperatures;
    }
    private function getNextWeatherdataId(): int
    {
        // Get the EntityManager
        $entityManager = $this->doctrine->getManager();

        // Get the repository for the Weatherdata entity
        $repository = $entityManager->getRepository(Weatherdata::class);

        // Query for the maximum id
        $queryBuilder = $repository->createQueryBuilder('w');
        $queryBuilder->select('MAX(w.id)');
        $maxId = $queryBuilder->getQuery()->getSingleScalarResult();

        // If there are no existing records, start from 1, otherwise, increment the maximum id
        return $maxId ? $maxId + 1 : 1;
    }



    private function isTemperatureUnreal($weatherRecord): bool
    {
        $stationName = $weatherRecord->getSTN();
        $temperature = $weatherRecord->getTEMP();

        // Fetch the last 5 temperature readings for the given station name
        $lastFiveTemperatures = $this->getLastThirtyTemperatures($stationName);

        if (count($lastFiveTemperatures) < 2) {
            // Not enough data points to determine unreal temperature
            return false;
        }

        // Calculate the average of the last 5 temperatures
        $averageTemperature = array_sum($lastFiveTemperatures) / count($lastFiveTemperatures);

        // Calculate the threshold for unreal temperature (20% deviation from the average)
        $threshold = $averageTemperature * 0.20;

        // Check if the current temperature is outside the threshold
        $deviation = abs($temperature - $averageTemperature);
        if ($deviation >= $threshold) {
            return true;
            // Temperature is unreal
        }

        return false; // Temperature is within acceptable range
    }



}