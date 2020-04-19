<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PokemonModelRepository")
 */
class PokemonModel
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
    private $abilities = [];

    /**
     * @ORM\Column(type="array")
     */
    private $moves = [];

    /**
     * @ORM\Column(type="array")
     */
    private $types = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $frontSprite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $backSprite;

    /**
     * @ORM\Column(type="integer")
     */
    private $baseExperience;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $color;

    /**
     * @ORM\Column(type="integer")
     */
    private $evolutionChainId;

    /**
     * @ORM\Column(type="array")
     */
    private $stats = [];

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

    public function getAbilities(): ?array
    {
        return $this->abilities;
    }

    public function setAbilities(array $abilities): self
    {
        $this->abilities = $abilities;

        return $this;
    }

    public function getMoves(): ?array
    {
        return $this->moves;
    }

    public function setMoves(array $moves): self
    {
        $this->moves = $moves;

        return $this;
    }

    public function getTypes(): ?array
    {
        return $this->types;
    }

    public function setTypes(array $types): self
    {
        $this->types = $types;

        return $this;
    }

    public function getFrontSprite(): ?string
    {
        return $this->frontSprite;
    }

    public function setFrontSprite(string $frontSprite): self
    {
        $this->frontSprite = $frontSprite;

        return $this;
    }

    public function getBackSprite(): ?string
    {
        return $this->backSprite;
    }

    public function setBackSprite(?string $backSprite): self
    {
        $this->backSprite = $backSprite;

        return $this;
    }

    public function getBaseExperience(): ?int
    {
        return $this->baseExperience;
    }

    public function setBaseExperience(int $baseExperience): self
    {
        $this->baseExperience = $baseExperience;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getEvolutionChainId(): ?int
    {
        return $this->evolutionChainId;
    }

    public function setEvolutionChainId(int $evolutionChainId): self
    {
        $this->evolutionChainId = $evolutionChainId;

        return $this;
    }

    public function getStats(): ?array
    {
        return $this->stats;
    }

    public function setStats(array $stats): self
    {
        $this->stats = $stats;

        return $this;
    }
}
