<?php

// src/Entity/Contract.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Contract
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string")]
    private string $contractDetails;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $startdatum;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $einddatum;

    #[ORM\Column(type: "string")]
    private string $status;

    #[ORM\ManyToOne(targetEntity: Klant::class)]
    private Klant $klant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContractDetails(): ?string
    {
        return $this->contractDetails;
    }

    public function setContractDetails(string $contractDetails): self
    {
        $this->contractDetails = $contractDetails;

        return $this;
    }

    public function getStartdatum(): ?\DateTimeInterface
    {
        return $this->startdatum;
    }

    public function setStartdatum(\DateTimeInterface $startdatum): self
    {
        $this->startdatum = $startdatum;

        return $this;
    }

    public function getEinddatum(): ?\DateTimeInterface
    {
        return $this->einddatum;
    }

    public function setEinddatum(\DateTimeInterface $einddatum): self
    {
        $this->einddatum = $einddatum;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

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
