<?php

namespace App\Controller;

use App\Entity\Weatherdata;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class WeatherDataEndpointController extends AbstractController
{
    #[Route('/api/weatherdata', name: 'api_weatherdata')]
    public function getWeatherData(Request $request, ManagerRegistry $doctrine): JsonResponse
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
        $wnddir = $request->query->get('wnddir');
        $limit = $request->query->get('limit');
        $timeStart = $request->query->get('startTime');
        $timeEnd = $request->query->get('endTime');
        $dateStart = $request->query->get('startDate');
        $dateEnd = $request->query->get('endDate');

        $repository = $doctrine->getRepository(Weatherdata::class);
        $queryBuilder = $repository->createQueryBuilder('w');

        if ($limit) {
            $queryBuilder->setMaxResults($limit);
        } else {
            $queryBuilder->setMaxResults(800);
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
                ->setParameter('temp', $temp);
        }
        if ($dewp) {
            $queryBuilder->andWhere('w.DEWP = :dewp')
                ->setParameter('dewp', $dewp);
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

        $weatherData = $queryBuilder->getQuery()->getResult();

        return $this->json([
            'weatherData' => $weatherData,
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
                'cldc' => $cldc,
                'wnddir' => $wnddir,
                'limit' => $limit,
                'startTime' => $timeStart,
                'endTime' => $timeEnd,
                'startDate' => $dateStart,
                'endDate' => $dateEnd,
            ],
        ]);
    }
}