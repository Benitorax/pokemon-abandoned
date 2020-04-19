<?php

namespace App\Service;

use App\Constant\ItemConstant;
use App\Entity\Inventory;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserService
{
    private $entityManager;
    private $passwordEncoder;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordEncoderInterface $passwordEncoder) {
        $this->entityManager = $entityManager;
        $this->passwordEncoder = $passwordEncoder;
    }

    public function createUser(string $username, string $email, string $password) {
        $user = new User();
        $encodedPassword = $this->passwordEncoder->encodePassword($user, $password);
        $user->setUsername($username)->setEmail($email)->setPassword($encodedPassword);
        
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        
        return $user;
    }

    public function createInventory(User $user): Inventory
    {
        $inventory = new Inventory();
        $inventory
        ->setPokeball([
            ItemConstant::POKE_BALL => 5,
            ItemConstant::GREAT_BALL => 0,
            ItemConstant::ULTRA_BALL => 0,
            ItemConstant::MASTER_BALL => 0
        ])
        ->setHealing([
            ItemConstant::POTION => 5,
            ItemConstant::SUPER_POTION => 0,
            ItemConstant::HYPER_POTION => 0,
            ItemConstant::MAX_POTION => 0,
            ItemConstant::FULL_RESTORE => 0
        ])
        ->setCure([
            ItemConstant::FULL_HEAL => 3
        ])
        ->setPpRecovery([
            ItemConstant::ESTHER => 0,
            ItemConstant::MAX_ESTHER => 0,
            ItemConstant::ELIXIR => 0,
            ItemConstant::MAX_EXLIXIR => 0
        ])
        ->setRevival([
            ItemConstant::REVIVE => 0,
            ItemConstant::MAX_REVIVE => 0,
            ItemConstant::SACRED_ASH => 0
        ]);

        $this->entityManager->persist($inventory);
        $this->entityManager->flush();
        
        return $inventory;
    }
}