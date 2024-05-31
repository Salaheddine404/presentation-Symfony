<?php

namespace App\Entity;

use App\Repository\RndVsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RndVsRepository::class)]
class RndVs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datTime = null;

    #[ORM\Column(length: 255)]
    private ?string $reminder = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utulisateur $utulisateur = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Service $service = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatTime(): ?\DateTimeInterface
    {
        return $this->datTime;
    }

    public function setDatTime(\DateTimeInterface $datTime): static
    {
        $this->datTime = $datTime;

        return $this;
    }

    public function getReminder(): ?string
    {
        return $this->reminder;
    }

    public function setReminder(string $reminder): static
    {
        $this->reminder = $reminder;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getUtulisateur(): ?Utulisateur
    {
        return $this->utulisateur;
    }

    public function setUtulisateur(?Utulisateur $utulisateur): static
    {
        $this->utulisateur = $utulisateur;

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): static
    {
        $this->service = $service;

        return $this;
    }
}
