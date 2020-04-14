<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage(SerializerInterface $serializer)
    {
        return $this->render('app/homepage.html.twig', [
            'user' =>  $serializer->serialize($this->getUser(), 'json', ['groups' => 'frontend'])
        ]);
    }

    /**
     * @Route("/signin", name="app_redirect_homepage_signin", methods={"GET"})
     */
    public function signInRedirect()
    {
        return $this->redirectToRoute('app_homepage');
    }

    /**
     * @Route("/login", name="app_redirect_homepage_login", methods={"GET"})
     */
     public function logInRedirect()
     {
         return $this->redirectToRoute('app_homepage');
     }
}
