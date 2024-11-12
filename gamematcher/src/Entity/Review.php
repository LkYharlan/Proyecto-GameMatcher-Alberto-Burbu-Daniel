<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReviewRepository::class)]
class Review
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'review', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Videogames $videogame_id = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $trailer = null;

    #[ORM\Column]
    private ?int $score = null;

    #[ORM\Column(length: 10000, nullable: true)]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVideogameId(): ?Videogames
    {
        return $this->videogame_id;
    }

    public function setVideogameId(Videogames $videogame_id): static
    {
        $this->videogame_id = $videogame_id;

        return $this;
    }

    public function getTrailer(): ?string
    {
        return $this->trailer;
    }

    public function setTrailer(?string $trailer): static
    {
        $this->trailer = $trailer;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
