<?php

// src/Repository/KlantRepository.php

namespace App\Repository;

use App\Entity\Klant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class KlantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Klant::class);
    }

    // Voeg hier eventueel aangepaste query methoden toe

    public function findBySearch(string $search)
    {
        return $this->createQueryBuilder('k')
            ->where('k.naam LIKE :search')
            ->orWhere('k.email LIKE :search')
            ->setParameter('search', '%' . $search . '%')
            ->getQuery()
            ->getResult();
    }

    // Voeg de findAll methode toe om alle klanten op te halen
    public function findAll(): array
    {
        return $this->createQueryBuilder('k')
            ->getQuery()
            ->getResult();
    }
}
