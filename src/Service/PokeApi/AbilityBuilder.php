<?php
namespace App\Service\PokeApi;

use App\Entity\PokemonAbility;

class AbilityBuilder extends Builder
{
    private $api;

    public function __construct(PokeApi $api)
    {
        $this->api = $api;
    }

    public function createAbility(int $id): PokemonAbility 
    {
        $data = $this->api->fetchAbility($id);

        $ability = new PokemonAbility();
        $ability
        ->setId($id)
        ->setName($data['name'])
        ->setEffect($data['effect_entries'][0]['short_effect']);

        return $ability;
    }
}