<?php

namespace App\Entity;

use App\Repository\CpulistRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CpulistRepository::class)]
class Cpulist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 300)]
    private ?string $model = null;

    #[ORM\Column]
    private ?int $core = null;

    #[ORM\Column(length: 300)]
    private ?string $manufacturer = null;

    #[ORM\Column]
    private ?int $cpuscore = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getCore(): ?int
    {
        return $this->core;
    }

    public function setCore(int $core): static
    {
        $this->core = $core;

        return $this;
    }

    public function getManufacturer(): ?string
    {
        return $this->manufacturer;
    }

    public function setManufacturer(string $manufacturer): static
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    public function getCpuscore(): ?int
    {
        return $this->cpuscore;
    }

    public function setCpuscore(int $cpuscore): static
    {
        $this->cpuscore = $cpuscore;

        return $this;
    }

}
