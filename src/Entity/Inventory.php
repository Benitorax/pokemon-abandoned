<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InventoryRepository")
 */
class Inventory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array")
     */
    private $pokeball = [];

    /**
     * @ORM\Column(type="array")
     */
    private $healing = [];
    /**
     * @ORM\Column(type="array")
     */
    private $cure = [];

    /**
     * @ORM\Column(type="array")
     */
    private $ppRecovery = [];

    /**
     * @ORM\Column(type="array")
     */
    private $revival = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPokeball(): ?array
    {
        return $this->pokeball;
    }

    public function setPokeball(array $pokeball): self
    {
        $this->pokeball = $pokeball;

        return $this;
    }

    public function getHealing(): ?array
    {
        return $this->healing;
    }

    public function setHealing(array $healing): self
    {
        $this->healing = $healing;

        return $this;
    }

    public function getCure(): ?array
    {
        return $this->cure;
    }

    public function setCure(array $cure): self
    {
        $this->cure = $cure;

        return $this;
    }

    public function getPpRecovery(): ?array
    {
        return $this->ppRecovery;
    }

    public function setPpRecovery(array $ppRecovery): self
    {
        $this->ppRecovery = $ppRecovery;

        return $this;
    }

    public function getRevival(): ?array
    {
        return $this->revival;
    }

    public function setRevival(array $revival): self
    {
        $this->revival = $revival;

        return $this;
    }
}
