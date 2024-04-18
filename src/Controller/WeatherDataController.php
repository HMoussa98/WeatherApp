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
                // Validate and process each weather record
                $weatherRecord = $this->processWeatherRecord($weatherRecordArray);

                // If a valid record is returned, persist it
                if ($weatherRecord instanceof Weatherdata) {
                    $entityManager->persist($weatherRecord);
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

    // Function to validate and process each weather record
    private function processWeatherRecord(array $weatherRecordArray): ?Weatherdata
    {
        // Validate if all required fields are present
        $requiredFields = ['STN', 'DATE', 'TIME', 'TEMP', 'DEWP', 'STP', 'SLP', 'VISIB', 'WDSP', 'PRCP', 'SNDP', 'FRSHTT', 'CLDC', 'WNDDIR'];
        foreach ($requiredFields as $field) {
            if (!isset($weatherRecordArray[$field])) {
                return null; // Missing required field, skip this record
            }
        }

        // Check if temperature reading is unreal
        if (isset($weatherRecordArray['TEMP'])) {
            $expectedTemperature = $this->calculateExpectedTemperature($weatherRecordArray);
            $temperature = $weatherRecordArray['TEMP'];
            if ($this->isUnrealTemperature($temperature, $expectedTemperature)) {
                // Adjust temperature
                $weatherRecordArray['TEMP'] = $expectedTemperature;
                $this->logTemperatureMalfunction($weatherRecordArray['STN'], $temperature, $expectedTemperature);
            }
        }

        // Create Weatherdata entity
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

        return $weatherRecord;
    }

    // Function to calculate the expected temperature based on previous measurements
    private function calculateExpectedTemperature(array $weatherRecordArray): float
    {
        // Implement your logic to calculate the expected temperature
        // For example, you could average the previous 30 temperature measurements
        // and return that value.

        // Sample implementation:
        $previousTemperatures = []; // Assuming you have an array of previous temperature measurements
        if (count($previousTemperatures) === 0) {
            return 0.0; // Return a default value if there are no previous measurements
        }

        $averageTemperature = array_sum($previousTemperatures) / count($previousTemperatures);
        return $averageTemperature;
    }

    // Function to check if a temperature reading is unreal
    private function isUnrealTemperature(float $temperature, float $expectedTemperature): bool
    {
        // Implement your logic to determine if the temperature reading is unreal
        // For example, you could compare the temperature reading with the expected temperature
        // and return true if it's considered unreal, and false otherwise.

        // Sample implementation:
        $thresholdPercentage = 20; // Define the threshold percentage
        $threshold = $expectedTemperature * ($thresholdPercentage / 100); // Calculate the threshold value

        // Check if the temperature reading is 20% greater or less than the expected temperature
        if ($temperature > ($expectedTemperature + $threshold) || $temperature < ($expectedTemperature - $threshold)) {
            return true; // Return true if the temperature reading is unreal
        } else {
            return false; // Return false otherwise
        }
    }

    // Function to log temperature malfunction
    private function logTemperatureMalfunction(string $station, float $originalTemperature, float $adjustedTemperature): void
    {
        // Implement your logic to log temperature malfunction
        // You can use the logger service to log the details
        $this->logger->info('Temperature malfunction detected at station ' . $station . ': Original temperature = ' . $originalTemperature . ', Adjusted temperature = ' . $adjustedTemperature);
    }
}
