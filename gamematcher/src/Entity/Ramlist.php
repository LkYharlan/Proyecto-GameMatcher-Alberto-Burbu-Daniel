<?php

namespace App\Entity;

use App\Repository\RamlistRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RamlistRepository::class)]
class Ramlist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 300)]
    private ?string $technology = null;

    #[ORM\Column(length: 300)]
    private ?string $memory = null;

    #[ORM\Column(length: 300)]
    private ?string $frequency = null;

    #[ORM\Column]
    private ?int $ramscore = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTechnology(): ?string
    {
        return $this->technology;
    }

    public function setTechnology(string $technology): static
    {
        $this->technology = $technology;

        return $this;
    }

    public function getMemory(): ?string
    {
        return $this->memory;
    }

    public function setMemory(string $memory): static
    {
        $this->memory = $memory;

        return $this;
    }

    public function getFrequency(): ?string
    {
        return $this->frequency;
    }

    public function setFrequency(string $frequency): static
    {
        $this->frequency = $frequency;

        return $this;
    }

    public function getRamscore(): ?int
    {
        return $this->ramscore;
    }

    public function setRamscore(int $ramscore): static
    {
        $this->ramscore = $ramscore;

        return $this;
    }

}
