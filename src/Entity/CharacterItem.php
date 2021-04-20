<?php

namespace App\Entity;

use App\Repository\CharacterItemRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterItemRepository::class)
 */
class CharacterItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Item::class)
     */
    private $itemId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=5000, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slot;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $level;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $attack;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $defence;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $hp;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $strength;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dexterity;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $constitution;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $intelligence;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $wisdom;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $charisma;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $value;

    /**
     * @ORM\OneToOne(targetEntity=Character::class, mappedBy="weaponRightSlot", cascade={"persist", "remove"})
     */
    private $weaponRightSlot;

    /**
     * @ORM\OneToOne(targetEntity=Character::class, mappedBy="weaponLeftSlot", cascade={"persist", "remove"})
     */
    private $weaponLeftSlot;

    /**
     * @ORM\OneToOne(targetEntity=Character::class, mappedBy="bodyArmorSlot", cascade={"persist", "remove"})
     */
    private $bodyArmorSlot;

    /**
     * @ORM\OneToOne(targetEntity=Character::class, mappedBy="headSlot", cascade={"persist", "remove"})
     */
    private $headSlot;

    /**
     * @ORM\OneToOne(targetEntity=Character::class, mappedBy="handSlot", cascade={"persist", "remove"})
     */
    private $handSlot;

    /**
     * @ORM\OneToOne(targetEntity=Character::class, mappedBy="feetSlot", cascade={"persist", "remove"})
     */
    private $feetSlot;

    /**
     * @ORM\OneToOne(targetEntity=Character::class, mappedBy="beltSlot", cascade={"persist", "remove"})
     */
    private $beltSlot;

    /**
     * @ORM\OneToOne(targetEntity=Character::class, mappedBy="neckSlot", cascade={"persist", "remove"})
     */
    private $neckSlot;

    /**
     * @ORM\OneToOne(targetEntity=Character::class, mappedBy="ringRightSlot", cascade={"persist", "remove"})
     */
    private $ringRightSlot;

    /**
     * @ORM\OneToOne(targetEntity=Character::class, mappedBy="ringLeftSlot", cascade={"persist", "remove"})
     */
    private $ringLeftSlot;

    /**
     * @ORM\OneToOne(targetEntity=Character::class, mappedBy="backSlot", cascade={"persist", "remove"})
     */
    private $backSlot;

    /**
     * @ORM\ManyToOne(targetEntity=GameSave::class, inversedBy="characterItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $save;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItemId(): ?Item
    {
        return $this->itemId;
    }

    public function setItemId(?Item $itemId): self
    {
        $this->itemId = $itemId;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSlot(): ?string
    {
        return $this->slot;
    }

    public function setSlot(?string $slot): self
    {
        $this->slot = $slot;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(?int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getAttack(): ?int
    {
        return $this->attack;
    }

    public function setAttack(?int $attack): self
    {
        $this->attack = $attack;

        return $this;
    }

    public function getDefence(): ?int
    {
        return $this->defence;
    }

    public function setDefence(?int $defence): self
    {
        $this->defence = $defence;

        return $this;
    }

    public function getHp(): ?int
    {
        return $this->hp;
    }

    public function setHp(?int $hp): self
    {
        $this->hp = $hp;

        return $this;
    }

    public function getStrength(): ?int
    {
        return $this->strength;
    }

    public function setStrength(?int $strength): self
    {
        $this->strength = $strength;

        return $this;
    }

    public function getDexterity(): ?int
    {
        return $this->dexterity;
    }

    public function setDexterity(?int $dexterity): self
    {
        $this->dexterity = $dexterity;

        return $this;
    }

    public function getConstitution(): ?int
    {
        return $this->constitution;
    }

    public function setConstitution(?int $constitution): self
    {
        $this->constitution = $constitution;

        return $this;
    }

    public function getIntelligence(): ?int
    {
        return $this->intelligence;
    }

    public function setIntelligence(?int $intelligence): self
    {
        $this->intelligence = $intelligence;

        return $this;
    }

    public function getWisdom(): ?int
    {
        return $this->wisdom;
    }

    public function setWisdom(?int $wisdom): self
    {
        $this->wisdom = $wisdom;

        return $this;
    }

    public function getCharisma(): ?int
    {
        return $this->charisma;
    }

    public function setCharisma(?int $charisma): self
    {
        $this->charisma = $charisma;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(?int $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getWeaponRightSlot(): ?Character
    {
        return $this->weaponRightSlot;
    }

    public function setWeaponRightSlot(?Character $weaponRightSlot): self
    {
        // unset the owning side of the relation if necessary
        if ($weaponRightSlot === null && $this->weaponRightSlot !== null) {
            $this->weaponRightSlot->setWeaponRightSlot(null);
        }

        // set the owning side of the relation if necessary
        if ($weaponRightSlot !== null && $weaponRightSlot->getWeaponRightSlot() !== $this) {
            $weaponRightSlot->setWeaponRightSlot($this);
        }

        $this->weaponRightSlot = $weaponRightSlot;

        return $this;
    }

    public function getWeaponLeftSlot(): ?Character
    {
        return $this->weaponLeftSlot;
    }

    public function setWeaponLeftSlot(?Character $weaponLeftSlot): self
    {
        // unset the owning side of the relation if necessary
        if ($weaponLeftSlot === null && $this->weaponLeftSlot !== null) {
            $this->weaponLeftSlot->setWeaponLeftSlot(null);
        }

        // set the owning side of the relation if necessary
        if ($weaponLeftSlot !== null && $weaponLeftSlot->getWeaponLeftSlot() !== $this) {
            $weaponLeftSlot->setWeaponLeftSlot($this);
        }

        $this->weaponLeftSlot = $weaponLeftSlot;

        return $this;
    }

    public function getBodyArmorSlot(): ?Character
    {
        return $this->bodyArmorSlot;
    }

    public function setBodyArmorSlot(?Character $bodyArmorSlot): self
    {
        // unset the owning side of the relation if necessary
        if ($bodyArmorSlot === null && $this->bodyArmorSlot !== null) {
            $this->bodyArmorSlot->setBodyArmorSlot(null);
        }

        // set the owning side of the relation if necessary
        if ($bodyArmorSlot !== null && $bodyArmorSlot->getBodyArmorSlot() !== $this) {
            $bodyArmorSlot->setBodyArmorSlot($this);
        }

        $this->bodyArmorSlot = $bodyArmorSlot;

        return $this;
    }

    public function getHeadSlot(): ?Character
    {
        return $this->headSlot;
    }

    public function setHeadSlot(?Character $headSlot): self
    {
        // unset the owning side of the relation if necessary
        if ($headSlot === null && $this->headSlot !== null) {
            $this->headSlot->setHeadSlot(null);
        }

        // set the owning side of the relation if necessary
        if ($headSlot !== null && $headSlot->getHeadSlot() !== $this) {
            $headSlot->setHeadSlot($this);
        }

        $this->headSlot = $headSlot;

        return $this;
    }

    public function getHandSlot(): ?Character
    {
        return $this->handSlot;
    }

    public function setHandSlot(?Character $handSlot): self
    {
        // unset the owning side of the relation if necessary
        if ($handSlot === null && $this->handSlot !== null) {
            $this->handSlot->setHandSlot(null);
        }

        // set the owning side of the relation if necessary
        if ($handSlot !== null && $handSlot->getHandSlot() !== $this) {
            $handSlot->setHandSlot($this);
        }

        $this->handSlot = $handSlot;

        return $this;
    }

    public function getFeetSlot(): ?Character
    {
        return $this->feetSlot;
    }

    public function setFeetSlot(?Character $feetSlot): self
    {
        // unset the owning side of the relation if necessary
        if ($feetSlot === null && $this->feetSlot !== null) {
            $this->feetSlot->setFeetSlot(null);
        }

        // set the owning side of the relation if necessary
        if ($feetSlot !== null && $feetSlot->getFeetSlot() !== $this) {
            $feetSlot->setFeetSlot($this);
        }

        $this->feetSlot = $feetSlot;

        return $this;
    }

    public function getBeltSlot(): ?Character
    {
        return $this->beltSlot;
    }

    public function setBeltSlot(?Character $beltSlot): self
    {
        // unset the owning side of the relation if necessary
        if ($beltSlot === null && $this->beltSlot !== null) {
            $this->beltSlot->setBeltSlot(null);
        }

        // set the owning side of the relation if necessary
        if ($beltSlot !== null && $beltSlot->getBeltSlot() !== $this) {
            $beltSlot->setBeltSlot($this);
        }

        $this->beltSlot = $beltSlot;

        return $this;
    }

    public function getNeckSlot(): ?Character
    {
        return $this->neckSlot;
    }

    public function setNeckSlot(?Character $neckSlot): self
    {
        // unset the owning side of the relation if necessary
        if ($neckSlot === null && $this->neckSlot !== null) {
            $this->neckSlot->setNeckSlot(null);
        }

        // set the owning side of the relation if necessary
        if ($neckSlot !== null && $neckSlot->getNeckSlot() !== $this) {
            $neckSlot->setNeckSlot($this);
        }

        $this->neckSlot = $neckSlot;

        return $this;
    }

    public function getRingRightSlot(): ?Character
    {
        return $this->ringRightSlot;
    }

    public function setRingRightSlot(?Character $ringRightSlot): self
    {
        // unset the owning side of the relation if necessary
        if ($ringRightSlot === null && $this->ringRightSlot !== null) {
            $this->ringRightSlot->setRingRightSlot(null);
        }

        // set the owning side of the relation if necessary
        if ($ringRightSlot !== null && $ringRightSlot->getRingRightSlot() !== $this) {
            $ringRightSlot->setRingRightSlot($this);
        }

        $this->ringRightSlot = $ringRightSlot;

        return $this;
    }

    public function getRingLeftSlot(): ?Character
    {
        return $this->ringLeftSlot;
    }

    public function setRingLeftSlot(?Character $ringLeftSlot): self
    {
        // unset the owning side of the relation if necessary
        if ($ringLeftSlot === null && $this->ringLeftSlot !== null) {
            $this->ringLeftSlot->setRingLeftSlot(null);
        }

        // set the owning side of the relation if necessary
        if ($ringLeftSlot !== null && $ringLeftSlot->getRingLeftSlot() !== $this) {
            $ringLeftSlot->setRingLeftSlot($this);
        }

        $this->ringLeftSlot = $ringLeftSlot;

        return $this;
    }

    public function getBackSlot(): ?Character
    {
        return $this->backSlot;
    }

    public function setBackSlot(?Character $backSlot): self
    {
        // unset the owning side of the relation if necessary
        if ($backSlot === null && $this->backSlot !== null) {
            $this->backSlot->setBackSlot(null);
        }

        // set the owning side of the relation if necessary
        if ($backSlot !== null && $backSlot->getBackSlot() !== $this) {
            $backSlot->setBackSlot($this);
        }

        $this->backSlot = $backSlot;

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
}
