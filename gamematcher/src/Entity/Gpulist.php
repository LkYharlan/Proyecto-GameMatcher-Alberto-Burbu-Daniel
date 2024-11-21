<?php

namespace App\Entity;

use App\Repository\GpulistRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GpulistRepository::class)]
class Gpulist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 300)]
    private ?string $model = null;

    #[ORM\Column]
    private ?int $vram = null;

    #[ORM\Column(length: 300)]
    private ?string $manufacturer = null;

    #[ORM\Column]
    private ?int $gpuscore = null;

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

    public function getVram(): ?int
    {
        return $this->vram;
    }

    public function setVram(int $vram): static
    {
        $this->vram = $vram;

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

    public function getGpuscore(): ?int
    {
        return $this->gpuscore;
    }

    public function setGpuscore(int $gpuscore): static
    {
        $this->gpuscore = $gpuscore;

        return $this;
    }

}
