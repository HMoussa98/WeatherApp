<?php

namespace App\Controller;

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
                $weatherRecord->setTEMP($weatherRecordArray['TEMP']);
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

            return new Response('Weather data successfully received and saved to the database', Response::HTTP_OK);
        } catch (\Exception $e) {
            // Log any errors
            $this->logger->error('Error occurred while saving weather data: ' . $e->getMessage());

            // Return an error response
            return new Response('An error occurred while saving weather data.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
