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

    /**
     * @ORM\Column(type="integer")
     */
    private $experience;

    /**
     * @ORM\Column(type="boolean")
     */
    private $canLevelUp;

    /**
     * @ORM\Column(type="integer")
     */
    private $skillPoints;

    /**
     * @ORM\OneToOne(targetEntity=CharacterItem::class, inversedBy="weaponRightSlot", cascade={"persist", "remove"})
     */
    private $weaponRightSlot;

    /**
     * @ORM\OneToOne(targetEntity=CharacterItem::class, inversedBy="weaponLeftSlot", cascade={"persist", "remove"})
     */
    private $weaponLeftSlot;

    /**
     * @ORM\OneToOne(targetEntity=CharacterItem::class, inversedBy="bodyArmorSlot", cascade={"persist", "remove"})
     */
    private $bodyArmorSlot;

    /**
     * @ORM\OneToOne(targetEntity=CharacterItem::class, inversedBy="headSlot", cascade={"persist", "remove"})
     */
    private $headSlot;

    /**
     * @ORM\OneToOne(targetEntity=CharacterItem::class, inversedBy="handSlot", cascade={"persist", "remove"})
     */
    private $handSlot;

    /**
     * @ORM\OneToOne(targetEntity=CharacterItem::class, inversedBy="feetSlot", cascade={"persist", "remove"})
     */
    private $feetSlot;

    /**
     * @ORM\OneToOne(targetEntity=CharacterItem::class, inversedBy="beltSlot", cascade={"persist", "remove"})
     */
    private $beltSlot;

    /**
     * @ORM\OneToOne(targetEntity=CharacterItem::class, inversedBy="neckSlot", cascade={"persist", "remove"})
     */
    private $neckSlot;

    /**
     * @ORM\OneToOne(targetEntity=CharacterItem::class, inversedBy="ringRightSlot", cascade={"persist", "remove"})
     */
    private $ringRightSlot;

    /**
     * @ORM\OneToOne(targetEntity=CharacterItem::class, inversedBy="ringLeftSlot", cascade={"persist", "remove"})
     */
    private $ringLeftSlot;

    /**
     * @ORM\OneToOne(targetEntity=CharacterItem::class, inversedBy="backSlot", cascade={"persist", "remove"})
     */
    private $backSlot;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $bonusAttack;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $bonusHp;

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

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(int $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getCanLevelUp(): ?bool
    {
        return $this->canLevelUp;
    }

    public function setCanLevelUp(bool $canLevelUp): self
    {
        $this->canLevelUp = $canLevelUp;

        return $this;
    }

    public function getSkillPoints(): ?int
    {
        return $this->skillPoints;
    }

    public function setSkillPoints(int $skillPoints): self
    {
        $this->skillPoints = $skillPoints;

        return $this;
    }

    public function getWeaponRightSlot(): ?CharacterItem
    {
        return $this->weaponRightSlot;
    }

    public function setWeaponRightSlot(?CharacterItem $weaponRightSlot): self
    {
        $this->weaponRightSlot = $weaponRightSlot;

        return $this;
    }

    public function getWeaponLeftSlot(): ?CharacterItem
    {
        return $this->weaponLeftSlot;
    }

    public function setWeaponLeftSlot(?CharacterItem $weaponLeftSlot): self
    {
        $this->weaponLeftSlot = $weaponLeftSlot;

        return $this;
    }

    public function getBodyArmorSlot(): ?CharacterItem
    {
        return $this->bodyArmorSlot;
    }

    public function setBodyArmorSlot(?CharacterItem $bodyArmorSlot): self
    {
        $this->bodyArmorSlot = $bodyArmorSlot;

        return $this;
    }

    public function getHeadSlot(): ?CharacterItem
    {
        return $this->headSlot;
    }

    public function setHeadSlot(?CharacterItem $headSlot): self
    {
        $this->headSlot = $headSlot;

        return $this;
    }

    public function getHandSlot(): ?CharacterItem
    {
        return $this->handSlot;
    }

    public function setHandSlot(?CharacterItem $handSlot): self
    {
        $this->handSlot = $handSlot;

        return $this;
    }

    public function getFeetSlot(): ?CharacterItem
    {
        return $this->feetSlot;
    }

    public function setFeetSlot(?CharacterItem $feetSlot): self
    {
        $this->feetSlot = $feetSlot;

        return $this;
    }

    public function getBeltSlot(): ?CharacterItem
    {
        return $this->beltSlot;
    }

    public function setBeltSlot(?CharacterItem $beltSlot): self
    {
        $this->beltSlot = $beltSlot;

        return $this;
    }

    public function getNeckSlot(): ?CharacterItem
    {
        return $this->neckSlot;
    }

    public function setNeckSlot(?CharacterItem $neckSlot): self
    {
        $this->neckSlot = $neckSlot;

        return $this;
    }

    public function getRingRightSlot(): ?CharacterItem
    {
        return $this->ringRightSlot;
    }

    public function setRingRightSlot(?CharacterItem $ringRightSlot): self
    {
        $this->ringRightSlot = $ringRightSlot;

        return $this;
    }

    public function getRingLeftSlot(): ?CharacterItem
    {
        return $this->ringLeftSlot;
    }

    public function setRingLeftSlot(?CharacterItem $ringLeftSlot): self
    {
        $this->ringLeftSlot = $ringLeftSlot;

        return $this;
    }

    public function getBackSlot(): ?CharacterItem
    {
        return $this->backSlot;
    }

    public function setBackSlot(?CharacterItem $backSlot): self
    {
        $this->backSlot = $backSlot;

        return $this;
    }

    public function getBonusAttack(): ?int
    {
        return $this->bonusAttack;
    }

    public function setBonusAttack(?int $bonusAttack): self
    {
        $this->bonusAttack = $bonusAttack;

        return $this;
    }

    public function getBonusHp(): ?int
    {
        return $this->bonusHp;
    }

    public function setBonusHp(?int $bonusHp): self
    {
        $this->bonusHp = $bonusHp;

        return $this;
    }
}
