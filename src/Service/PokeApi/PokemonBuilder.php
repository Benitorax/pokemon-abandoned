<?php
namespace App\Service\PokeApi;

use App\Entity\PokemonModel;

class PokemonBuilder extends Builder
{
    private $api;

    public function __construct(PokeApi $api) 
    {
        $this->api = $api;
    }


    public function createPokemonModel(int $id): PokemonModel 
    {
        $data = $this->api->fetchPokemon($id);
        $otherData = $this->api->fetchPokemonSpecies($id);

        $pokemon = new PokemonModel();
        $pokemon
        ->setId($id)
        ->setName($data['name'])
        ->setAbilities($this->fetchAbilities($data['abilities']))
        ->setTypes($this->fetchTypes($data['types']))
        ->setMoves($this->fetchMoves($data['moves']))
        ->setBaseExperience($data['base_experience'])
        ->setFrontSprite($data['sprites']['front_default'])
        ->setBackSprite($data['sprites']['back_default'])
        ->setEvolutionChainId($this->getIdFromUrl($otherData['evolution_chain']['url']))
        ->setColor($otherData['color']['name'])
        ->setStats($this->fetchStats($data['stats']));

        return $pokemon;
    }

    public function fetchAbilities(array $data): array 
    {
        $abilities = [];
        
        foreach($data as $ability) {
            $abilities[$ability['ability']['name']] = $this->getIdFromUrl($ability['ability']['url']);
        }

        return $abilities;
    }

    public function fetchTypes(array $data): array 
    {
        $types = [];

        foreach($data as $type) {
            $types[$type['type']['name']] = $this->getIdFromUrl($type['type']['url']);  
        }

        return $types;
    }

    public function fetchMoves(array $data): array 
    {
        $moves = [];

        foreach($data as $move) {
            if($move['version_group_details'][0]['move_learn_method']['name'] !== 'level-up') continue;
            
            $level = $move['version_group_details'][0]['level_learned_at'];
            $moves[$level][] = [
                $move['move']['name'] => $this->getIdFromUrl($move['move']['url'])
            ];  
        }

        return $moves;
    }

    public function fetchStats(array $data): array 
    {
        $stats = [];

        foreach($data as $stat) {
            $stats[$stat['stat']['name']] = $stat['base_stat'];  
        }

        return $stats;
    }
}