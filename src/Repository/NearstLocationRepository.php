<?php

namespace App\Repository;

use App\Entity\NearstLocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NearstLocation>
 *
 * @method NearstLocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method NearstLocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method NearstLocation[]    findAll()
 * @method NearstLocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NearstLocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NearstLocation::class);
    }

    //    /**
    //     * @return NearstLocation[] Returns an array of NearstLocation objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('n')
    //            ->andWhere('n.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('n.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?NearstLocation
    //    {
    //        return $this->createQueryBuilder('n')
    //            ->andWhere('n.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
