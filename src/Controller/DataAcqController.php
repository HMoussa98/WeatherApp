<?php

namespace App\Controller;
use App\Entity\GeoLocation;
use App\Entity\Station;
use App\Repository\GeoLocationRepository;
use App\Repository\NearstLocationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use App\Entity\Weatherdata;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DataAcqController extends AbstractController
{   
    #[Route('/data_acq', name: 'app_data_acq')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $stn = $request->query->get('stn');
        $date = $request->query->get('date');
        $time = $request->query->get('time');
        $temp = $request->query->get('temp');
        $dewp = $request->query->get('dewp');
        $stp = $request->query->get('stp');
        $slp = $request->query->get('slp');
        $visib = $request->query->get('visib');
        $wdsp = $request->query->get('wdsp');
        $prcp = $request->query->get('prcp');
        $sndp = $request->query->get('sndp');
        $frshtt = $request->query->get('frshtt');
        $cldc = $request->query->get('cldc');
        $wnddir = $request->query->get('winddir');
        $limit = $request->query->get('limit');
        $timeStart = $request->query->get('startTime');
        $timeEnd = $request->query->get('endTime');
        $dateStart = $request->query->get('startDate');
        $dateEnd = $request->query->get('endDate');
        // Create a query builder instance
        $repository = $doctrine->getRepository(Weatherdata::class);
        $queryBuilder = $repository->createQueryBuilder('w');
        if ($limit) {
            $queryBuilder->setMaxResults($limit);
        }else{
            $queryBuilder->setMaxResults(10);

        }




        if ($dateStart && $dateEnd) {
            $queryBuilder->andWhere('w.DATE BETWEEN :startDate AND :endDate')
                ->setParameter('startDate', new \DateTime($dateStart))
                ->setParameter('endDate', new \DateTime($dateEnd));
        } elseif ($dateStart) {
            $queryBuilder->andWhere('w.DATE >= :startDate')
                ->setParameter('startDate', new \DateTime($dateStart));
        } elseif ($dateEnd) {
            $queryBuilder->andWhere('w.DATE <= :endDate')
                ->setParameter('endDate', new \DateTime($dateEnd));
        }




        if ($timeStart && $timeEnd) {
            $queryBuilder->andWhere('w.TIME BETWEEN :startTime AND :endTime')
                ->setParameter('startTime', \DateTime::createFromFormat('H:i:s', $timeStart))
                ->setParameter('endTime', \DateTime::createFromFormat('H:i:s', $timeEnd));
        } elseif ($timeStart) {
            $queryBuilder->andWhere('w.TIME >= :startTime')
                ->setParameter('startTime', \DateTime::createFromFormat('H:i:s', $timeStart));
        } elseif ($timeEnd) {
            $queryBuilder->andWhere('w.TIME <= :endTime')
                ->setParameter('endTime', \DateTime::createFromFormat('H:i:s', $timeEnd));
        }
        if ($stn) {
            $queryBuilder->andWhere('w.STN = :stn')
                ->setParameter('stn', $stn);
        }
        if ($date) {
            $queryBuilder->andWhere('w.DATE = :date')
                ->setParameter('date', new \DateTime($date));
        }

        if ($temp) {
            $queryBuilder->andWhere('w.TEMP = :temp')
                ->setParameter('temp', $temp);var_dump($temp);
        }
        if ($dewp) {
            $queryBuilder->andWhere('w.DEWP = :dewp')
                ->setParameter('dewp', $dewp);var_dump($dewp);
        }
        if ($stp) {
            $queryBuilder->andWhere('w.STP = :stp')
                ->setParameter('stp', $stp);
        }
        if ($slp) {
            $queryBuilder->andWhere('w.SLP = :slp')
                ->setParameter('slp', $slp);
        }
        if ($visib) {
            $queryBuilder->andWhere('w.VISIB = :visib')
                ->setParameter('visib', $visib);
        }
        if ($wdsp) {
            $queryBuilder->andWhere('w.WDSP = :wdsp')
                ->setParameter('wdsp', $wdsp);
        }
        if ($prcp) {
            $queryBuilder->andWhere('w.PRCP = :prcp')
                ->setParameter('prcp', $prcp);
        }
        if ($sndp) {
            $queryBuilder->andWhere('w.SNDP = :sndp')
                ->setParameter('sndp', $sndp);
        }
        if ($frshtt) {
            $queryBuilder->andWhere('w.FRSHTT = :frshtt')
                ->setParameter('frshtt', $frshtt);
        }
        if ($cldc) {
            $queryBuilder->andWhere('w.CLDC = :cldc')
                ->setParameter('cldc', $cldc);
        }
        if ($wnddir) {
            $queryBuilder->andWhere('w.WNDDIR = :wnddir')
                ->setParameter('wnddir', $wnddir);
        }


        // Execute the query
        $weatherData = $queryBuilder->getQuery()->getResult();


        // Render the view with the filtered data
        return $this->render('data_acq/index.html.twig', [
            'weatherData' => $weatherData,

            // Pass the filters back to the     form for persistence
            'filters' => [
                'stn' => $stn,
                'date' => $date,
                'time' => $time,
                'temp' => $temp,
                'dewp' => $dewp,
                'stp' => $stp,
                'slp' => $slp,
                'visib' => $visib,
                'wdsp' => $wdsp,
                'prcp' => $prcp,
                'sndp' => $sndp,
                'frshtt' => $frshtt,
                'cldc' =>  $cldc,
                'wnddir' => $wnddir,
                'limit' => $limit,
                'startTime'=>$timeStart,
                'endTime'=>$timeEnd,
                'startDate'=>$dateStart,
                'endDate'=>$dateEnd,



            ],
        ]);
    }



    #[Route('/weer-stations', name: 'weer_stations')]
    public function weatherStations(Request $request, ManagerRegistry $doctrine): Response
    {
        $station = $request->query->get('station');
        $limit = $request->query->get('limit');
        $beginLongitude = $request->query->get('begin_longitude');
        $endLongitude = $request->query->get('end_longitude');
        $beginLatitude = $request->query->get('begin_latitude');
        $endLatitude = $request->query->get('end_latitude');

        // Retrieve weather stations with geolocation information
        $repository = $doctrine->getRepository(Station::class);
        $queryBuilder = $repository->createQueryBuilder('s');

        // Apply filters if provided
        if ($station) {
            $queryBuilder->andWhere('s.name LIKE :station')
                ->setParameter('station', '%'.$station.'%');
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
            $queryBuilder->setMaxResults(10);
        }

        $weatherStations = $queryBuilder->getQuery()->getResult();

        // Pass the data to the view
        return $this->render('data_acq/weer-stations.html.twig', [
            'weatherStations' => $weatherStations,
            'filters' => [
                'station' => $station,
                'limit' => $limit,
                'begin_longitude' => $beginLongitude,
                'end_longitude' => $endLongitude,
                'begin_latitude' => $beginLatitude,
                'end_latitude' => $endLatitude,
            ],
        ]);
    }

    #[Route('geolocation/{station}', name: 'geolocation')]
    public function geolocation($station, GeoLocationRepository $geoLocationRepository, NearstLocationRepository $nearestLocationRepository): Response
    {
        $geoLocation = $geoLocationRepository->findOneBy(['stationName' => $station]);
        $nearestLocation = $nearestLocationRepository->findOneBy(['stationName' => $station]);

        return $this->render('data_acq/geoLocation.html.twig', [
            'geoLocation' => $geoLocation,
            'nearestLocation' => $nearestLocation,
        ]);
    }



    #[Route('nearestlocation/{station}', name: 'nearestlocation')]
    public function nearestlocation($station,NearstLocationRepository $nearestLocationRepository): Response
    {
        // Assuming you have a service to calculate the nearest location
        $nearestLocation = $nearestLocationRepository->findOneBy(['stationName' => $station]);

        return $this->render('data_acq/nearestLocation.html.twig', [
            'nearestLocation' => $nearestLocation,
            'stationName'=>$station

        ]);
    }

}
