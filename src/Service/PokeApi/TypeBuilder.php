<?php
namespace App\Service\PokeApi;

use App\Entity\PokemonType;
use App\Service\PokeApi\PokeApi;


class TypeBuilder extends Builder
{
    private $api;

    public function __construct(PokeApi $api) 
    {
        $this->api = $api;
    }

    public function createType(int $id): PokemonType
    {
        $data = $this->api->fetchType($id);
        $damageRelations = $data['damage_relations'];

        $type = new PokemonType();
        $type
        ->setId($id)
        ->setName($data['name'])
        ->setDoubleDamageFrom($this->fetchDamageRelation($damageRelations['double_damage_from']))
        ->setDoubleDamageTo($this->fetchDamageRelation($damageRelations['double_damage_to']))
        ->setHalfDamageFrom($this->fetchDamageRelation($damageRelations['half_damage_from']))
        ->setHalfDamageTo($this->fetchDamageRelation($damageRelations['half_damage_to']))
        ->setNoDamageFrom($this->fetchDamageRelation($damageRelations['no_damage_from']))
        ->setNoDamageTo($this->fetchDamageRelation($damageRelations['no_damage_to']));

        return $type;
    }

    public function fetchDamageRelation(array $data): array
    {
        $damageRelations = [];
        foreach($data as $damageRelation) {
            $damageRelations[$damageRelation['name']] = $this->getIdFromUrl($damageRelation['url']);
        }
        return $damageRelations;
    }
}