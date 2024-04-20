<?php
// src/Entity/Abonnement.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Abonnement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string")]
    private string $abonnementType;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $geldigheid;

    #[ORM\ManyToOne(targetEntity: Klant::class)]
    private Klant $klant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAbonnementType(): ?string
    {
        return $this->abonnementType;
    }

    public function setAbonnementType(string $abonnementType): self
    {
        $this->abonnementType = $abonnementType;

        return $this;
    }

    public function getGeldigheid(): ?\DateTimeInterface
    {
        return $this->geldigheid;
    }

    public function setGeldigheid(\DateTimeInterface $geldigheid): self
    {
        $this->geldigheid = $geldigheid;

        return $this;
    }

    public function getKlant(): ?Klant
    {
        return $this->klant;
    }

    public function setKlant(?Klant $klant): self
    {
        $this->klant = $klant;

        return $this;
    }
}
