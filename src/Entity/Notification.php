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

    #[ORM\Column(nullable: true)]
    private ?array $STNID = null;

    #[ORM\Column(nullable: true)]
    private ?array $WEERID = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Time = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ErrorName = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Description = null;

    /**
     * @return array|null
     */
    public function getSTNID(): ?array
    {
        return $this->STNID;
    }

    /**
     * @param array|null $STNID
     */
    public function setSTNID(?array $STNID): void
    {
        $this->STNID = $STNID;
    }

    /**
     * @return array|null
     */
    public function getWEERID(): ?array
    {
        return $this->WEERID;
    }

    /**
     * @param array|null $WEERID
     */
    public function setWEERID(?array $WEERID): void
    {
        $this->WEERID = $WEERID;
    }


    public function getId(): ?int
    {
        return $this->id;
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
