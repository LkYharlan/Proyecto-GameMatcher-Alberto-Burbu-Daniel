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

    #[ORM\OneToOne(mappedBy: 'cpu_id', cascade: ['persist', 'remove'])]
    private ?Myspecs $gpu_id = null;

    #[ORM\OneToOne(mappedBy: 'cpu_id', cascade: ['persist', 'remove'])]
    private ?Myspecs $myspecs = null;

    #[ORM\OneToMany(targetEntity: Videogames::class, mappedBy: 'cpurequirement', cascade: ['persist', 'remove'])]
    private ?Videogames $videogames = null;

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

    public function getGpuId(): ?Myspecs
    {
        return $this->gpu_id;
    }

    public function setGpuId(?Myspecs $gpu_id): static
    {
        // unset the owning side of the relation if necessary
        if ($gpu_id === null && $this->gpu_id !== null) {
            $this->gpu_id->setCpuId(null);
        }

        // set the owning side of the relation if necessary
        if ($gpu_id !== null && $gpu_id->getCpuId() !== $this) {
            $gpu_id->setCpuId($this);
        }

        $this->gpu_id = $gpu_id;

        return $this;
    }

    public function getMyspecs(): ?Myspecs
    {
        return $this->myspecs;
    }

    public function setMyspecs(?Myspecs $myspecs): static
    {
        // unset the owning side of the relation if necessary
        if ($myspecs === null && $this->myspecs !== null) {
            $this->myspecs->setCpuId(null);
        }

        // set the owning side of the relation if necessary
        if ($myspecs !== null && $myspecs->getCpuId() !== $this) {
            $myspecs->setCpuId($this);
        }

        $this->myspecs = $myspecs;

        return $this;
    }

    public function getVideogames(): ?Videogames
    {
        return $this->videogames;
    }

    public function setVideogames(Videogames $videogames): static
    {
        // set the owning side of the relation if necessary
        if ($videogames->getCpurequirement() !== $this) {
            $videogames->setCpurequirement($this);
        }

        $this->videogames = $videogames;

        return $this;
    }
}
