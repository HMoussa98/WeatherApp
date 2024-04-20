<?php

namespace App\Entity;

use App\Repository\NearstLocationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NearstLocationRepository::class)]
#[ORM\Table(name: "nearestlocation")]
class NearstLocation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $stationName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $administrativeRegion1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $administrativeRegion2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $countryCode = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $longitude = null;

    #[ORM\Column(nullable: true)]
    private ?float $latitude = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStationName(): ?string
    {
        return $this->stationName;
    }

    public function setStationName(?string $stationName): static
    {
        $this->stationName = $stationName;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAdministrativeRegion1(): ?string
    {
        return $this->administrativeRegion1;
    }

    public function setAdministrativeRegion1(?string $administrativeRegion1): static
    {
        $this->administrativeRegion1 = $administrativeRegion1;

        return $this;
    }

    public function getAdministrativeRegion2(): ?string
    {
        return $this->administrativeRegion2;
    }

    public function setAdministrativeRegion2(?string $administrativeRegion2): static
    {
        $this->administrativeRegion2 = $administrativeRegion2;

        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(?string $countryCode): static
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(?float $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }



}
