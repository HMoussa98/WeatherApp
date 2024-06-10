<?php

namespace App\Controller;

use App\Entity\GeoLocation;
use App\Entity\Station;
use App\Repository\GeoLocationRepository;
use App\Repository\StationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class WeatherStationsEndpoint extends AbstractController
{
    #[Route('/api/weer-stations', name: 'weer_stations', methods: ['GET'])]
    public function weatherStations(Request $request, StationRepository $stationRepository, SerializerInterface $serializer): Response
    {
        $station = $request->query->get('station');
        $limit = $request->query->get('limit');
        $beginLongitude = $request->query->get('begin_longitude');
        $endLongitude = $request->query->get('end_longitude');
        $beginLatitude = $request->query->get('begin_latitude');
        $endLatitude = $request->query->get('end_latitude');
        $countryCode = $request->query->get('country_code');

        if (!$beginLongitude) {
            $beginLongitude = 30;
        }

        if (!$endLongitude) {
            $endLongitude = 62;
        }

        if (!$beginLatitude) {
            $beginLatitude = 12;
        }

        if (!$endLatitude) {
            $endLatitude = 40;
        }


        $queryBuilder = $stationRepository->createQueryBuilder('s');

        if ($countryCode) {
            $queryBuilder
                ->join(GeoLocation::class, 'geo')
                ->andWhere('geo.stationName = s.name')
                ->andWhere('geo.countryCode = :countryCode')
                ->setParameter('countryCode', $countryCode);
        }

        if ($station) {
            $queryBuilder->andWhere('s.name LIKE :station')
                ->setParameter('station', '%' . $station . '%');
        }

        if ($beginLongitude && $endLongitude) {
            $queryBuilder->andWhere('s.longitude BETWEEN :beginLongitude AND :endLongitude')
                ->setParameter('beginLongitude', $beginLongitude)
                ->setParameter('endLongitude', $endLongitude);
        } elseif ($beginLongitude) {
            $queryBuilder->andWhere('s.longitude >= :beginLongitude')
                ->setParameter('beginLongitude', $beginLongitude);
        } elseif ($endLongitude) {
            $queryBuilder->andWhere('s.longitude <= :endLongitude')
                ->setParameter('endLongitude', $endLongitude);
        }

        if ($beginLatitude && $endLatitude) {
            $queryBuilder->andWhere('s.latitude BETWEEN :beginLatitude AND :endLatitude')
                ->setParameter('beginLatitude', $beginLatitude)
                ->setParameter('endLatitude', $endLatitude);
        } elseif ($beginLatitude) {
            $queryBuilder->andWhere('s.latitude >= :beginLatitude')
                ->setParameter('beginLatitude', $beginLatitude);
        } elseif ($endLatitude) {
            $queryBuilder->andWhere('s.latitude <= :endLatitude')
                ->setParameter('endLatitude', $endLatitude);
        }

        if ($limit) {
            $queryBuilder->setMaxResults($limit);
        } else {
            $queryBuilder->setMaxResults(500);
        }

        $weatherStations = $queryBuilder->getQuery()->getResult();

        $jsonContent = $serializer->serialize($weatherStations, 'json');
        return new Response($jsonContent, Response::HTTP_OK, ['Content-Type' => 'application/json']);
    }

    #[Route('/api/geolocation/{station}', name: 'geolocation', methods: ['GET'])]
    public function geolocation($station, GeoLocationRepository $geoLocationRepository, SerializerInterface $serializer): Response
    {
        $geoLocation = $geoLocationRepository->findOneBy(['stationName' => $station]);

        if (!$geoLocation) {
            return new Response('Geolocation not found', Response::HTTP_NOT_FOUND);
        }

        $jsonContent = $serializer->serialize($geoLocation, 'json');
        return new Response($jsonContent, Response::HTTP_OK, ['Content-Type' => 'application/json']);
    }
}
