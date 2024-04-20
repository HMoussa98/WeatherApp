<?php

namespace App\Repository;

use App\Entity\Station;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
class StationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Station::class);
    }

//    public function findWithWeatherData($stationName)
//    {
//        return $this->createQueryBuilder('s')
//            ->leftJoin('s.weather', 'w')
//            ->addSelect('w')
//            ->where('s.name = :name')
//            ->setParameter('name', $stationName)
//            ->getQuery()
//            ->getOneOrNullResult();
//    }
}
