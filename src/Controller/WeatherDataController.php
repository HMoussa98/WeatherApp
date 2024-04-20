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
                $weatherRecord = new Weatherdata();

                // Set properties of the Weatherdata entity
                $weatherRecord->setSTN($weatherRecordArray['STN']);
                $weatherRecord->setDATE(new \DateTime($weatherRecordArray['DATE']));
                $weatherRecord->setTIME(new \DateTime($weatherRecordArray['TIME']));

                // Check for missing values
                $missingValues = $this->checkMissingValues($weatherRecordArray);
                if (!empty($missingValues)) {
                    // Create a notification for missing values
                    $this->createMissingValuesNotification($weatherRecord, $missingValues);
                }

                // Handle missing values and unreal temperature readings
                $temp = $weatherRecordArray['TEMP'];
                $weatherRecord->setTEMP($temp);

                // Set other properties
                $weatherRecord->setDEWP($weatherRecordArray['DEWP']);
                $weatherRecord->setSTP($weatherRecordArray['STP']);
                $weatherRecord->setSLP($weatherRecordArray['SLP']);
                $weatherRecord->setVISIB($weatherRecordArray['VISIB']);
                $weatherRecord->setWDSP($weatherRecordArray['WDSP']);
                $weatherRecord->setPRCP($weatherRecordArray['PRCP']);
                $weatherRecord->setSNDP($weatherRecordArray['SNDP']);
                $weatherRecord->setFRSHTT($weatherRecordArray['FRSHTT']);
                $weatherRecord->setCLDC($weatherRecordArray['CLDC']);
                $weatherRecord->setWNDDIR($weatherRecordArray['WNDDIR']);

                // Persist the entity
                $entityManager->persist($weatherRecord);
            }

            // Flush changes to the database
            $entityManager->flush();

            // Send notification for unreal temperature readings
            foreach ($weatherDataArray['WEATHERDATA'] as $weatherRecordArray) {
                $temp = $weatherRecordArray['TEMP'];
                if ($temp !== null && $this->isTemperatureUnreal($weatherRecordArray['STN'], $temp)) {
                    // Get the last thirty weather records for the station
                    $lastThirtyWeatherData = $this->getLastThirtyTemperatures($weatherRecordArray['STN']);

                    // Extract station IDs from the last thirty records
                    $stationIds = array_map(function($weatherData) {
                        return $weatherData->getSTN();
                    }, $lastThirtyWeatherData);
                    $this->postRequestCounter++;
                    if ($this->postRequestCounter >= 5) {
                        // Reset the counter
                        $this->postRequestCounter = 0;
                    // Send notification with station IDs
                        $this->sendNotification($stationIds);
                }
                }
            }


            return new Response('Weather data successfully received and saved to the database', Response::HTTP_OK);
        } catch (\Exception $e) {
            // Log any errors
            $this->logger->error('Error occurred while saving weather data: ' . $e->getMessage());

            // Return an error response
            return new Response('An error occurred while saving weather data.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    private function checkMissingValues(array $weatherRecordArray): array
    {
        $missingValues = [];
        foreach ($weatherRecordArray as $key => $value) {
            if ($value === null || $value === '') {
                $missingValues[] = $key;
            }
        }
        return $missingValues;
    }

    private function createMissingValuesNotification(Weatherdata $weatherData, array $missingValues)
    {
        try {
            // Create a new Notification entity object
            $notification = new Notification();

            // Set properties of the Notification entity
            $notification->setSTNID($weatherData->getSTN());
            $notification->setWEERID($weatherData->getId());
            $notification->setDate(new \DateTime());
            $notification->setTime(new \DateTime());

            // Set the error name and description
            $notification->setErrorName('Missing Values');
            $notification->setDescription('Missing values detected at station: ' . $weatherData->getSTN());

            // Append details of missing values to the description
            $notification->setDescription($notification->getDescription() . ' Missing values: ' . implode(', ', $missingValues));

            // Get the entity manager
            $entityManager = $this->doctrine->getManager();

            // Persist the entity
            $entityManager->persist($notification);
        } catch (\Exception $e) {
            // Log any errors
            $this->logger->error('Error occurred while creating missing values notification: ' . $e->getMessage());
        }
    }

    private function getLastThirtyTemperatures(string $station): array
    {
        // Get the entity manager
        $entityManager = $this->doctrine->getManager();

        // Get the Weatherdata repository
        $weatherDataRepository = $entityManager->getRepository(Weatherdata::class);

        // Query to retrieve the last 30 temperature measurements for the station
        $queryBuilder = $weatherDataRepository->createQueryBuilder('w');
        $queryBuilder->select('w')
            ->where('w.STN = :station')
            ->orderBy('w.DATE', 'DESC')
            ->setMaxResults(30)
            ->setParameter('station', $station);

        // Execute the query and fetch the results
        return $queryBuilder->getQuery()->getResult();
    }

    // Function to check if temperature reading is unreal
    private function isTemperatureUnreal(string $station, float $temperature): bool
    {
        // Get the last 30 temperature measurements for the station from the database
        $lastThirtyWeatherData = $this->getLastThirtyTemperatures($station);

        // Check if there are measurements available
        if (empty($lastThirtyWeatherData)) {
            // If no measurements available, return false or handle accordingly
            return false;
        }

        // Calculate the average temperature from the last 30 measurements
        $averageTemperature = 0;
        foreach ($lastThirtyWeatherData as $weatherData) {
            $averageTemperature += $weatherData->getTEMP();
        }
        $averageTemperature /= count($lastThirtyWeatherData);

        // Calculate the expected temperature based on extrapolation ± 20%
        $expectedTemperature = $averageTemperature * 1.2;

        // Check if the current temperature is 20% or more greater or less than expected
        return $temperature >= $expectedTemperature * 1.2 || $temperature <= $expectedTemperature * 0.8;
    }

    // Function to send notification for unreal temperature readings
    private function sendNotification(array $stations)
    {
        try {
            // Create a new Notification entity object
            $notification = new Notification();

            // Set properties of the Notification entity
            $notification->setSTNID($stations); // Set all stations tested for unreal temperature
            $notification->setWEERID([]);
            $notification->setDate(new \DateTime());
            $notification->setTime(new \DateTime());

            // Set the error name and description
            $notification->setErrorName('Unreal temperature reading');
            $notification->setDescription('Unreal temperature reading detected at stations');

            // Get the entity manager
            $entityManager = $this->doctrine->getManager();

            // Persist the entity
            $entityManager->persist($notification);
            $entityManager->flush();
        } catch (\Exception $e) {
            // Log any errors
            $this->logger->error('Error occurred while sending notification: ' . $e->getMessage());
        }
    }

}