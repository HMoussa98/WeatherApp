<?php

namespace App\Entity;

use App\Repository\NotificationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotificationRepository::class)]
class Notification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $STNID = null;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $WEERID = null;


    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Time = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ErrorName = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Status = null; // New status property

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->Status;
    }

    /**
     * @param string|null $Status
     */
    public function setStatus(?string $Status): void
    {
        $this->Status = $Status;
    }





    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getSTNID(): ?int
    {
        return $this->STNID;
    }

    /**
     * @param int|null $STNID
     */
    public function setSTNID(?int $STNID): void
    {
        $this->STNID = $STNID;
    }

    /**
     * @return int|null
     */
    public function getWEERID(): ?int
    {
        return $this->WEERID;
    }

    /**
     * @param int|null $WEERID
     */
    public function setWEERID(?int $WEERID): void
    {
        $this->WEERID = $WEERID;
    }




    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(?\DateTimeInterface $Date): static
    {
        $this->Date = $Date;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->Time;
    }

    public function setTime(?\DateTimeInterface $Time): static
    {
        $this->Time = $Time;

        return $this;
    }

    public function getErrorName(): ?string
    {
        return $this->ErrorName;
    }

    public function setErrorName(?string $ErrorName): static
    {
        $this->ErrorName = $ErrorName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }
}
