<?php

namespace App\Entity;

use App\Repository\StationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StationRepository::class)]
class Station
{
    #[ORM\Id]
    #[ORM\Column(type: "string", length: 10)]
    private string $name;

    #[ORM\Column(type: "float")]
    private float $longitude;

    #[ORM\Column(type: "float")]
    private float $latitude;

    #[ORM\Column(type: "float")]
    private float $elevation;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getElevation(): float
    {
        return $this->elevation;
    }

    public function setElevation(float $elevation): self
    {
        $this->elevation = $elevation;
        return $this;
    }
}
