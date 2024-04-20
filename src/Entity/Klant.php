<?php

// src/Entity/Klant.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Klant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string")]
    private string $type;

    #[ORM\Column(type: "string")]
    private string $telefoonnummer;

    #[ORM\Column(type: "string")]
    private string $naam;

    #[ORM\Column(type: "string")]
    private string $email;

    #[ORM\Column(type: "string", nullable: true)]
    private string $contractDetails;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $startdatum;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $einddatum;

    #[ORM\Column(type: "string")]
    private string $status = 'actief';



    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTelefoonnummer(): ?string
    {
        return $this->telefoonnummer;
    }

    public function setTelefoonnummer(string $telefoonnummer): self
    {
        $this->telefoonnummer = $telefoonnummer;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }


    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status ?? 'actief';
        return $this;
    }

}