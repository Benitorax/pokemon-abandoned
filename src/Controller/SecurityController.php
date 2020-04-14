<?php

namespace App\Controller;

use App\Service\UserService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\SerializerInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/register", name="security", methods={"POST"})
     */
    public function registerUser(Request $request, UserService $userService)
    {
        $data = $request->getContent();
        /** stdclass */
        $data = json_decode($data);
        
        $user = $userService->createUser($data->username, $data->email, $data->password);

        return $this->json([
            'username' => $user->getUsername(),
            'email' => $user->getEmail()
        ]);
    }

    /**
     * @Route("/login", name="app_login", methods={"POST"})
     */
    public function login(SerializerInterface $serializer) {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->json([
                'error' => 'Invalid login request: check that the Content-Type header is "application/json".'
            ], 400);
        }

        return $this->json([
            'user' =>  $serializer->serialize($this->getUser(), 'json', ['groups' => 'frontend'])
        ]);
    }

    /**
     * @Route("/logout", name="app_logout", methods={"GET"})
     */
    public function logout()
    {
        throw new \Exception('should not be reached');
    }
}
