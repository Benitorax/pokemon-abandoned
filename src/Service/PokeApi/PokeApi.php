<?php
namespace App\Service\PokeApi;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class PokeApi
{
    const BASE_URL = 'https://pokeapi.co/api/v2/';
    private $client;

    public function __construct(HttpClientInterface $client) {
        $this->client = $client;
    }

    /**
     * from 1 to 807
     * from 1 to 802 with only front sprite
     * from 1 to 649 with sprites (generation 5)
     */
    public function fetchPokemon(int $id): array
    {
        return $this->client
            ->request('GET', self::BASE_URL.'pokemon/'.$id)
            ->toArray();
    }

    public function fetchPokemonSpecies(int $id): array
    {
        return $this->client
            ->request('GET', self::BASE_URL.'pokemon-species/'.$id)
            ->toArray();
    }

    /**
     * from 1 to 9
     */
    public function fetchHabitat(int $id): array
    {
        return $this->client
            ->request('GET', self::BASE_URL.'pokemon-habitat/'.$id)
            ->toArray();
    }

    /**
     * from 1 to 18
     */
    public function fetchType(int $id): array
    {
        return $this->client
            ->request('GET', self::BASE_URL.'type/'.$id)
            ->toArray();
    }

    /**
     * from 1 to 728
     * from 1 to 559 for generation 5
     */
    public function fetchMove(int $id): array
    {
        return $this->client
            ->request('GET', self::BASE_URL.'move/'.$id)
            ->toArray();
    }

    /**
     * from 1 to 233
     * from 1 to 164 for generation 5
     */
    public function fetchAbility(int $id): array
    {
        return $this->client
            ->request('GET', self::BASE_URL.'ability/'.$id)
            ->toArray();
    }

    /**
     * from 1 to 8
     */
    public function fetchStat(int $id): array
    {
        return $this->client
            ->request('GET', self::BASE_URL.'stat/'.$id)
            ->toArray();
    }


    //####### Data for const in PokemonMove
    /**
     * from 1 to 14
     */
    public function fetchMoveTarget(int $id): array
    {
        return $this->client
            ->request('GET', self::BASE_URL.'move-target/'.$id)
            ->toArray();
    }
    
    /**
     * from 1 to 3
     */
    public function fetchMoveDamageClass(int $id): array
    {
        return $this->client
            ->request('GET', self::BASE_URL.'move-damage-class/'.$id)
            ->toArray();
    }

    /**
     * from 0 to 21 (except 10,11,16)
     */
    public function fetchMoveAilment(int $id): array
    {
        return $this->client
            ->request('GET', self::BASE_URL.'move-ailment/'.$id)
            ->toArray();
    }

    /**
     * from 1 to 13
     */
    public function fetchMoveCategory(int $id): array
    {
        return $this->client
            ->request('GET', self::BASE_URL.'move-category/'.$id)
            ->toArray();
    }
    //####### END Data for const in PokemonMove
    
    public function fetchItem(int $id): array
    {
        return $this->client
            ->request('GET', self::BASE_URL.'item/'.$id)
            ->toArray();
    }

    /**
     * from 1 to 427
     * from 1 to 336 for generation 5
     * no 210, 222, 225, 226, 227, 231, 238, 251
     */
    public function fetchEvolutionChain(int $id): array
    {
        return $this->client
            ->request('GET', self::BASE_URL.'evolution-chain/'.$id)
            ->toArray();
    }
}