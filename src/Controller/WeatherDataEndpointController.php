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
        $limit = $request->query->get('limit');
        $timeStart = $request->query->get('startTime');
        $timeEnd = $request->query->get('endTime');
        $dateStart = $request->query->get('startDate');
        $dateEnd = $request->query->get('endDate');

        $repository = $doctrine->getRepository(Weatherdata::class);
        $queryBuilder = $repository->createQueryBuilder('w')
            ->select('w.STN, w.TEMP, w.TIME, w.DEWP, w.STP, w.SLP');

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

        $weatherData = $queryBuilder->getQuery()->getResult();

        return $this->json([
            'weatherData' => array_map(function ($data) {
                return [
                    'STN' => $data['STN'],
                    'TEMP' => $data['TEMP'],
                    'TIME' => $data['TIME'],
                    'DEWP' => $data['DEWP'],
                    'STP' => $data['STP'],
                    'SLP' => $data['SLP'],
                ];
            }, $weatherData),
        ]);
    }
}
