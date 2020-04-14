<?php

namespace App\Service;

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
}