<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PokemonMoveRepository")
 */
class PokemonMove
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $target;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $statChanges = [];

    /**
     * @ORM\Column(type="integer")
     */
    private $damageClass;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $effect;

    /**
     * @ORM\Column(type="array")
     */
    private $useAfter = [];

    /**
     * @ORM\Column(type="array")
     */
    private $useBefore = [];

    /**
     * @ORM\Column(type="integer")
     */
    private $ailment;

    /**
     * @ORM\Column(type="integer")
     */
    private $category;

    /**
     * @ORM\Column(type="integer")
     */
    private $power;

    /**
     * @ORM\Column(type="integer")
     */
    private $pp;

    /**
     * @ORM\Column(type="array")
     */
    private $turns = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
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

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTarget(): ?int
    {
        return $this->target;
    }

    public function setTarget(int $target): self
    {
        $this->target = $target;

        return $this;
    }

    public function getStatChanges(): ?array
    {
        return $this->statChanges;
    }

    public function setStatChanges(?array $statChanges): self
    {
        $this->statChanges = $statChanges;

        return $this;
    }

    public function getDamageClass(): ?int
    {
        return $this->damageClass;
    }

    public function setDamageClass(int $damageClass): self
    {
        $this->damageClass = $damageClass;

        return $this;
    }

    public function getEffect(): ?string
    {
        return $this->effect;
    }

    public function setEffect(string $effect): self
    {
        $this->effect = $effect;

        return $this;
    }

    public function getUseAfter(): ?array
    {
        return $this->useAfter;
    }

    public function setUseAfter(?array $useAfter): self
    {
        $this->useAfter = $useAfter;

        return $this;
    }

    public function getUseBefore(): ?array
    {
        return $this->useBefore;
    }

    public function setUseBefore(?array $useBefore): self
    {
        $this->useBefore = $useBefore;

        return $this;
    }

    public function getAilment(): ?int
    {
        return $this->ailment;
    }

    public function setAilment(int $ailment): self
    {
        $this->ailment = $ailment;

        return $this;
    }

    public function getCategory(): ?int
    {
        return $this->category;
    }

    public function setCategory(int $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getPower(): ?int
    {
        return $this->power;
    }

    public function setPower(int $power): self
    {
        $this->power = $power;

        return $this;
    }

    public function getPp(): ?int
    {
        return $this->pp;
    }

    public function setPp(int $pp): self
    {
        $this->pp = $pp;

        return $this;
    }

    public function getTurns(): ?array
    {
        return $this->turns;
    }

    public function setTurns(array $turns): self
    {
        $this->turns = $turns;

        return $this;
    }
}
