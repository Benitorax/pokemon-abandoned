<?php

namespace App\Controller;

use App\Service\PokeApi\TypeBuilder;
use App\Service\PokeApi\HabitatBuilder;
use App\Service\PokeApi\PokemonBuilder;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    /**
     * @Route("/api", name="app_api", methods={"GET"})
     */
    public function api(TypeBuilder $builder, PokemonBuilder $pbuilder, HabitatBuilder $hbuilder, EntityManagerInterface $em) {
        for($i=1 ; $i < 649; $i++) {
            $pokemon = $pbuilder->createPokemonModel($i);
            $em->persist($pokemon);
            
            if($i%20 === 0) {
                $em->flush();
                $em->clear();
            }
        };
        $em->flush();
        // for($i=1 ; $i < 649; $i++) {
        //     $pokemon = $pbuilder->createPokemonModel($i);
        //     $em->persist($pokemon);
            
        //     if($i%50 === 0) $em->flush();
        // };
        // $em->flush();
        //$hbuilder->createHabitat(1);
        //$builder->createType(1);
        // types, moves, evolution chain id, abilities
        $data = 'foobar';
        return $this->render('app/api.html.twig', [
            'data' => $data
        ]);
    }
}
