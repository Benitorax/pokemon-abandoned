<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PokemonStatRepository")
 */
class PokemonStat
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
    private $decreaseMoves = [];

    /**
     * @ORM\Column(type="array")
     */
    private $increaseMoves = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): self
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

    public function getDecreaseMoves(): ?array
    {
        return $this->decreaseMoves;
    }

    public function setDecreaseMoves(array $decreaseMoves): self
    {
        $this->decreaseMoves = $decreaseMoves;

        return $this;
    }

    public function getIncreaseMoves(): ?array
    {
        return $this->increaseMoves;
    }

    public function setIncreaseMoves(array $increaseMoves): self
    {
        $this->increaseMoves = $increaseMoves;

        return $this;
    }
}
