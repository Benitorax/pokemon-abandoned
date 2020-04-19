<?php
namespace App\Service\PokeApi;

use App\Entity\EvolutionChain;

class EvolutionChainBuilder extends Builder
{
    private $api;

    public function __construct(PokeApi $api)
    {
        $this->api = $api;
    }

    public function createEvolutionChain(int $id): EvolutionChain
    {
        $data = $this->api->fetchEvolutionChain($id);

        $evolutionChain = new EvolutionChain();
        $evolutionChain
        ->setId($id)
        ->setChain($this->fetchEvolution($data['chain']));
        
        return $evolutionChain;
    }

    public function fetchEvolution(array $data): array
    {
        $evolutionArray = [];
        $currentPokemon = $data['species'];
        $evolutionArray[$currentPokemon['name']] = $this->getIdFromUrl($currentPokemon['url']);
        if(count($data['evolves_to'])) {
            $evolutionArray['nextEvolution'] = $this->fetchNextEvolution($data['evolves_to']);
        }

        return $evolutionArray;
    }

    public function fetchNextEvolution(array $data): array
    {
        $evolutionArray = [];

        foreach($data as $evolvedPokemon) {
            $currentPokemon = $evolvedPokemon['species'];
            $evolutionArray[$currentPokemon['name']] = [
                'id' => $this->getIdFromUrl($currentPokemon['url']),
                'min_level' => $evolvedPokemon['evolution_details'][0]['min_level'] ?? rand(30, 40)
            ];

            if(count($evolvedPokemon['evolves_to'])) {
                $evolutionArray['nextEvolution'] = $this->fetchNextEvolution($evolvedPokemon['evolves_to']);
            }
        }

        return $evolutionArray;
    }
}