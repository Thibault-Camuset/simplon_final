<?php

namespace App\Entity;

use App\Repository\GameSaveRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GameSaveRepository::class)
 */
class GameSave
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $saveName;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="gameSaves")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSaveName(): ?string
    {
        return $this->saveName;
    }

    public function setSaveName(string $saveName): self
    {
        $this->saveName = $saveName;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
