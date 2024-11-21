<?php

namespace App\Entity;

use App\Repository\MyspecsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MyspecsRepository::class)]
class Myspecs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: true)] 
    private ?User $user_id = null;

    #[ORM\ManyToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cpulist $cpu_id = null;

    #[ORM\ManyToOne(cascade: ['persist', 'remove'])]
    private ?Gpulist $gpu_id = null;

    #[ORM\ManyToOne(cascade: ['persist', 'remove'])]
    private ?Ramlist $ram_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(User $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getCpuId(): ?Cpulist
    {
        return $this->cpu_id;
    }

    public function setCpuId(?Cpulist $cpu_id): static
    {
        $this->cpu_id = $cpu_id;

        return $this;
    }

    public function getGpuId(): ?Gpulist
    {
        return $this->gpu_id;
    }

    public function setGpuId(?Gpulist $gpu_id): static
    {
        $this->gpu_id = $gpu_id;

        return $this;
    }

    public function getRamId(): ?Ramlist
    {
        return $this->ram_id;
    }

    public function setRamId(?Ramlist $ram_id): static
    {
        $this->ram_id = $ram_id;

        return $this;
    }
}
