<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterRepository::class)
 * @ORM\Table(name="`character`")
 */
class Character
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\Column(type="integer")
     */
    private $strength;

    /**
     * @ORM\Column(type="integer")
     */
    private $dexterity;

    /**
     * @ORM\Column(type="integer")
     */
    private $constitution;

    /**
     * @ORM\Column(type="integer")
     */
    private $intelligence;

    /**
     * @ORM\Column(type="integer")
     */
    private $wisdom;

    /**
     * @ORM\Column(type="integer")
     */
    private $charisma;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxHp;

    /**
     * @ORM\ManyToOne(targetEntity=GameSave::class, inversedBy="characters")
     */
    private $save;

    /**
     * @ORM\Column(type="integer")
     */
    private $actions;

    /**
     * @ORM\Column(type="integer")
     */
    private $currentHp;

    /**
     * @ORM\Column(type="boolean")
     */
    private $inQuest;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $questStartedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $questEndingAt;

    /**
     * @ORM\Column(type="object", nullable=true)
     */
    private $quest;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getStrength(): ?int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): self
    {
        $this->strength = $strength;

        return $this;
    }

    public function getDexterity(): ?int
    {
        return $this->dexterity;
    }

    public function setDexterity(int $dexterity): self
    {
        $this->dexterity = $dexterity;

        return $this;
    }

    public function getConstitution(): ?int
    {
        return $this->constitution;
    }

    public function setConstitution(int $constitution): self
    {
        $this->constitution = $constitution;

        return $this;
    }

    public function getIntelligence(): ?int
    {
        return $this->intelligence;
    }

    public function setIntelligence(int $intelligence): self
    {
        $this->intelligence = $intelligence;

        return $this;
    }

    public function getWisdom(): ?int
    {
        return $this->wisdom;
    }

    public function setWisdom(int $wisdom): self
    {
        $this->wisdom = $wisdom;

        return $this;
    }

    public function getCharisma(): ?int
    {
        return $this->charisma;
    }

    public function setCharisma(int $charisma): self
    {
        $this->charisma = $charisma;

        return $this;
    }

    public function getMaxHp(): ?int
    {
        return $this->maxHp;
    }

    public function setMaxHp(int $maxHp): self
    {
        $this->maxHp = $maxHp;

        return $this;
    }

    public function getSave(): ?GameSave
    {
        return $this->save;
    }

    public function setSave(?GameSave $save): self
    {
        $this->save = $save;

        return $this;
    }

    public function getActions(): ?int
    {
        return $this->actions;
    }

    public function setActions(int $actions): self
    {
        $this->actions = $actions;

        return $this;
    }

    public function getCurrentHp(): ?int
    {
        return $this->currentHp;
    }

    public function setCurrentHp(int $currentHp): self
    {
        $this->currentHp = $currentHp;

        return $this;
    }

    public function getInQuest(): ?bool
    {
        return $this->inQuest;
    }

    public function setInQuest(bool $inQuest): self
    {
        $this->inQuest = $inQuest;

        return $this;
    }

    public function getQuestStartedAt(): ?\DateTimeInterface
    {
        return $this->questStartedAt;
    }

    public function setQuestStartedAt(?\DateTimeInterface $questStartedAt): self
    {
        $this->questStartedAt = $questStartedAt;

        return $this;
    }

    public function getQuestEndingAt(): ?\DateTimeInterface
    {
        return $this->questEndingAt;
    }

    public function setQuestEndingAt(?\DateTimeInterface $questEndingAt): self
    {
        $this->questEndingAt = $questEndingAt;

        return $this;
    }

    public function getQuest()
    {
        return $this->quest;
    }

    public function setQuest($quest): self
    {
        $this->quest = $quest;

        return $this;
    }
}
