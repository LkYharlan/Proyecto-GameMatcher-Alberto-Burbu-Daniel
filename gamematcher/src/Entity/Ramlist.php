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

    #[ORM\OneToOne(mappedBy: 'ram_id', cascade: ['persist', 'remove'])]
    private ?Myspecs $myspecs = null;

    #[ORM\OneToOne(mappedBy: 'ramrequirement', cascade: ['persist', 'remove'])]
    private ?Videogames $videogames = null;


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

    public function getMyspecs(): ?Myspecs
    {
        return $this->myspecs;
    }

    public function setMyspecs(?Myspecs $myspecs): static
    {
        // unset the owning side of the relation if necessary
        if ($myspecs === null && $this->myspecs !== null) {
            $this->myspecs->setRamId(null);
        }

        // set the owning side of the relation if necessary
        if ($myspecs !== null && $myspecs->getRamId() !== $this) {
            $myspecs->setRamId($this);
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
        if ($videogames->getRamrequirement() !== $this) {
            $videogames->setRamrequirement($this);
        }

        $this->videogames = $videogames;

        return $this;
    }

}
