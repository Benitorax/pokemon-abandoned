<?php
namespace App\Service\PokeApi;

use App\Entity\PokemonStat;

class StatBuilder extends Builder
{
    private $api;

    public function __construct(PokeApi $api)
    {
        $this->api = $api;
    }

    public function createStat(int $id): PokemonStat
    {
        $data = $this->api->fetchStat($id);

        $stat = new PokemonStat();
        $stat
        ->setId($id)
        ->setName($data['name'])
        ->setIncreaseMoves($this->fetchMoves($data['affecting_moves']['increase']))
        ->setDecreaseMoves($this->fetchMoves($data['affecting_moves']['decrease']));

        return $stat; 
    }

    public function fetchMoves(array $data): array
    {
        $moves = [];
        foreach($data as $move) {
            $moves[$this->getIdFromUrlProperty($move['move'])] = $move['change'];
        }

        return $moves;
    }
}