<?php

namespace App\Entity;

use App\Repository\GameSaveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity=Character::class, mappedBy="save")
     */
    private $characters;

    /**
     * @ORM\OneToMany(targetEntity=CharacterItem::class, mappedBy="save", orphanRemoval=true)
     */
    private $characterItems;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
        $this->characterItems = new ArrayCollection();
    }

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

    /**
     * @return Collection|Character[]
     */
    public function getCharacters(): Collection
    {
        return $this->characters;
    }

    public function addCharacter(Character $character): self
    {
        if (!$this->characters->contains($character)) {
            $this->characters[] = $character;
            $character->setSaveId($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): self
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getSaveId() === $this) {
                $character->setSaveId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CharacterItem[]
     */
    public function getCharacterItems(): Collection
    {
        return $this->characterItems;
    }

    public function addCharacterItem(CharacterItem $characterItem): self
    {
        if (!$this->characterItems->contains($characterItem)) {
            $this->characterItems[] = $characterItem;
            $characterItem->setSave($this);
        }

        return $this;
    }

    public function removeCharacterItem(CharacterItem $characterItem): self
    {
        if ($this->characterItems->removeElement($characterItem)) {
            // set the owning side to null (unless already changed)
            if ($characterItem->getSave() === $this) {
                $characterItem->setSave(null);
            }
        }

        return $this;
    }
}
