<?php

namespace App\Controller;

use App\Entity\Station;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Weatherdata;


class DevMaintanController extends AbstractController
{
    private ManagerRegistry $doctrine;
    private LoggerInterface $logger;

    public function __construct(ManagerRegistry $doctrine, LoggerInterface $logger)
    {
        $this->doctrine = $doctrine;
        $this->logger = $logger;
    }

    #[Route('/weatherData', name: 'weather_data')]
    public function weatherData(): Response
    {
        try {
            // Haal de weergegevens op uit de database
            $weatherData = $this->doctrine->getRepository(Weatherdata::class)->findBy([], null, 20);

            // Geef de weergegevens door aan de Twig-template
            return $this->render('weather_data/index.html.twig', [
                'weatherData' => $weatherData,
            ]);
        } catch (\Exception $e) {
            // Log eventuele fouten
            $this->logger->error('Er is een fout opgetreden bij het ophalen van weerdata: ' . $e->getMessage());

            // Geef een foutmelding terug
            return new Response('Er is een fout opgetreden bij het ophalen van weerdata.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    #[Route('/stationData', name: 'station_data')]
    public function stationData(): Response
    {
        try {
            // Haal de station gegevens op uit de database met bijbehorende weerdata
            $stationData = $this->doctrine->getRepository(Station::class)->findBy([], null, 20);

            // Geef de stationgegevens door aan de Twig-template
            return $this->render('station_data/index.html.twig', [
                'stationData' => $stationData,
            ]);
        } catch (\Exception $e) {
            // Log eventuele fouten
            $this->logger->error('Er is een fout opgetreden bij het ophalen van stationgegevens: ' . $e->getMessage());

            // Geef een foutmelding terug
            return new Response('Er is een fout opgetreden bij het ophalen van stationgegevens.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    #[Route('/dev_maintan', name: 'app_dev_maintan')]
    public function index(): Response
    {
        try {
            // Haal de weergegevens op uit de database
            $weatherData = $this->doctrine->getRepository(Weatherdata::class)->findBy([], null, 20);

            // Geef de weergegevens door aan de Twig-template
            return $this->render('dev_maintan/index.html.twig', [
                'weatherData' => $weatherData,
            ]);
        } catch (\Exception $e) {
            // Log eventuele fouten
            $this->logger->error('Er is een fout opgetreden bij het ophalen van weerdata: ' . $e->getMessage());

            // Geef een foutmelding terug
            return new Response('Er is een fout opgetreden bij het ophalen van weerdata.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}