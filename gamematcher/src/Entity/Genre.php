<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GenreRepository::class)]
class Genre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $category = null;

    #[ORM\ManyToOne(inversedBy: 'genre_id')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Videogames $videogames = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getVideogames(): ?Videogames
    {
        return $this->videogames;
    }

    public function setVideogames(?Videogames $videogames): static
    {
        $this->videogames = $videogames;

        return $this;
    }
}
