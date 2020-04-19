<?php
namespace App\Service\PokeApi;

use App\Entity\PokemonMove;
use App\Service\PokeApi\Builder;
use App\Service\PokeApi\PokeApi;

class MoveBuilder extends Builder
{
    private $api;

    public function __construct(PokeApi $api)
    {
        $this->api = $api;
    }

    public function createMove(int $id): PokemonMove 
    {
        $data = $this->api->fetchMove($id);

        $move = new PokemonMove();
        $move
        ->setId($id)
        ->setName($data['name'])
        ->setType($this->getIdFromUrlProperty($data['type']))
        ->setTarget($this->getIdFromUrlProperty($data['target']))
        ->setStatChanges($this->fetchStatChanges($data['stat_changes']))
        ->setDamageClass($this->getIdFromUrlProperty($data['damage_class']))
        ->setEffect($data['effect_entries'][0]['short_effect'])
        ->setPower($data['power'] ?? 0)
        ->setPp($data['pp']);

        if($data['meta']) {
            $move->setAilment($this->getIdFromUrlProperty($data['meta']['ailment']))
                ->setCategory($this->getIdFromUrlProperty($data['meta']['category']))
                ->setTurns([
                    $data['meta']['min_turns'] ?? 0, $data['meta']['max_turns'] ?? 0
                ]);
        }
        if($data['contest_combos']) {
            $move->setUseAfter($data['contest_combos']['normal']['use_after'])
                ->setUseBefore($data['contest_combos']['normal']['use_before']);
        }

        return $move;
    }

    public function fetchMoves(array $data): array 
    {
        $movesArray = [];

        foreach($data as $move) {
            $movesArray[$move['name']] = $this->getIdFromUrl($move['url']);
        }

        return $movesArray;
    }

    public function fetchStatChanges(array $data): array
    {
        $statChanges = [];

        foreach($data as $statChange) {
            $statChanges[$statChange['stat']['name']] = [
                $this->getIdFromUrl($statChange['stat']['url']) => $statChange['change']
            ];
        }

        return $statChanges;
    }
}