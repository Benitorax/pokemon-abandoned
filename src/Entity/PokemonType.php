<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PokemonTypeRepository")
 */
class PokemonType
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
     * @ORM\Column(type="array")
     */
    private $doubleDamageFrom = [];

    /**
     * @ORM\Column(type="array")
     */
    private $doubleDamageTo = [];

    /**
     * @ORM\Column(type="array")
     */
    private $halfDamageFrom = [];

    /**
     * @ORM\Column(type="array")
     */
    private $halfDamageTo = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $noDamageFrom = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $noDamageTo = [];

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

    public function getDoubleDamageFrom(): ?array
    {
        return $this->doubleDamageFrom;
    }

    public function setDoubleDamageFrom(array $doubleDamageFrom): self
    {
        $this->doubleDamageFrom = $doubleDamageFrom;

        return $this;
    }

    public function getDoubleDamageTo(): ?array
    {
        return $this->doubleDamageTo;
    }

    public function setDoubleDamageTo(array $doubleDamageTo): self
    {
        $this->doubleDamageTo = $doubleDamageTo;

        return $this;
    }

    public function getHalfDamageFrom(): ?array
    {
        return $this->halfDamageFrom;
    }

    public function setHalfDamageFrom(array $halfDamageFrom): self
    {
        $this->halfDamageFrom = $halfDamageFrom;

        return $this;
    }

    public function getHalfDamageTo(): ?array
    {
        return $this->halfDamageTo;
    }

    public function setHalfDamageTo(array $halfDamageTo): self
    {
        $this->halfDamageTo = $halfDamageTo;

        return $this;
    }

    public function getNoDamageFrom(): ?array
    {
        return $this->noDamageFrom;
    }

    public function setNoDamageFrom(?array $noDamageFrom): self
    {
        $this->noDamageFrom = $noDamageFrom;

        return $this;
    }

    public function getNoDamageTo(): ?array
    {
        return $this->noDamageTo;
    }

    public function setNoDamageTo(?array $noDamageTo): self
    {
        $this->noDamageTo = $noDamageTo;

        return $this;
    }
}
