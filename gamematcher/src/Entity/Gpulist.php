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

    #[ORM\OneToOne(mappedBy: 'gpu_id', cascade: ['persist', 'remove'])]
    private ?Myspecs $myspecs = null;

    #[ORM\OneToOne(mappedBy: 'gpurequirement', cascade: ['persist', 'remove'])]
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

    public function getMyspecs(): ?Myspecs
    {
        return $this->myspecs;
    }

    public function setMyspecs(?Myspecs $myspecs): static
    {
        // unset the owning side of the relation if necessary
        if ($myspecs === null && $this->myspecs !== null) {
            $this->myspecs->setGpuId(null);
        }

        // set the owning side of the relation if necessary
        if ($myspecs !== null && $myspecs->getGpuId() !== $this) {
            $myspecs->setGpuId($this);
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
        if ($videogames->getGpurequirement() !== $this) {
            $videogames->setGpurequirement($this);
        }

        $this->videogames = $videogames;

        return $this;
    }
}
