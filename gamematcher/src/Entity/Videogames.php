<?php

namespace App\Entity;

use App\Repository\VideogamesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VideogamesRepository::class)]
class Videogames
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(targetEntity: Genre::class, mappedBy: 'videogames')]
    private Collection $genre_id;

    #[ORM\ManyToOne(inversedBy: 'videogames', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ramlist $ramrequirement = null;

    #[ORM\ManyToOne(inversedBy: 'videogames', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cpulist $cpurequirement = null;

    #[ORM\ManyToOne(inversedBy: 'videogames', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Gpulist $gpurequirement = null;

    #[ORM\Column(length: 300)]
    private ?string $platform = null;

    #[ORM\Column(length: 300)]
    private ?string $name = null;

    #[ORM\OneToOne(mappedBy: 'videogame_id', cascade: ['persist', 'remove'])]
    private ?Review $review = null;

    #[ORM\OneToMany(targetEntity: Comments::class, mappedBy: 'videogame_id')]
    private Collection $comments;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $picture = null;

    public function __construct()
    {
        $this->genre_id = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Genre>
     */
    public function getGenreId(): Collection
    {
        return $this->genre_id;
    }

    public function addGenreId(Genre $genreId): static
    {
        if (!$this->genre_id->contains($genreId)) {
            $this->genre_id->add($genreId);
            $genreId->setVideogames($this);
        }

        return $this;
    }

    public function removeGenreId(Genre $genreId): static
    {
        if ($this->genre_id->removeElement($genreId)) {
            // set the owning side to null (unless already changed)
            if ($genreId->getVideogames() === $this) {
                $genreId->setVideogames(null);
            }
        }

        return $this;
    }

    public function getRamrequirement(): ?Ramlist
    {
        return $this->ramrequirement;
    }

    public function setRamrequirement(Ramlist $ramrequirement): static
    {
        $this->ramrequirement = $ramrequirement;

        return $this;
    }

    public function getCpurequirement(): ?Cpulist
    {
        return $this->cpurequirement;
    }

    public function setCpurequirement(Cpulist $cpurequirement): static
    {
        $this->cpurequirement = $cpurequirement;

        return $this;
    }

    public function getGpurequirement(): ?Gpulist
    {
        return $this->gpurequirement;
    }

    public function setGpurequirement(Gpulist $gpurequirement): static
    {
        $this->gpurequirement = $gpurequirement;

        return $this;
    }

    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    public function setPlatform(string $platform): static
    {
        $this->platform = $platform;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getReview(): ?Review
    {
        return $this->review;
    }

    public function setReview(Review $review): static
    {
        // set the owning side of the relation if necessary
        if ($review->getVideogameId() !== $this) {
            $review->setVideogameId($this);
        }

        $this->review = $review;

        return $this;
    }

    /**
     * @return Collection<int, Comments>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comments $comment): static
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setVideogameId($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): static
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getVideogameId() === $this) {
                $comment->setVideogameId(null);
            }
        }

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }
}
