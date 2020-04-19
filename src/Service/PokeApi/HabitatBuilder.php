<?php
namespace App\Service\PokeApi;

use App\Entity\Habitat;

class HabitatBuilder extends Builder
{
    private $api;

    public function __construct(PokeApi $api)
    {
        $this->api = $api;
    }

    public function createHabitat(int $id): Habitat 
    {
        $data = $this->api->fetchHabitat($id);

        $habitat = new Habitat();
        $habitat
        ->setId($id)
        ->setName($data['name'])
        ->setSpecies($this->fetchSpecies($data['pokemon_species']));

        return $habitat;
    }

    public function fetchSpecies($data) {
        $speciesArray = [];

        foreach($data as $species) {
            $speciesArray[$species['name']] = $this->getIdFromUrl($species['url']);
        }

        return $speciesArray;
    }
}