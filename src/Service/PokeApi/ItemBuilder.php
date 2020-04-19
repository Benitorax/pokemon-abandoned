<?php
namespace App\Service\PokeApi;

use App\Entity\Item;

class ItemBuilder
{
    const DATA = [
        [1, 'Poke Ball', 200, "Tries to catch a wild Pokémon.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/poke-ball.png'],
        [2, 'Great Ball', 600, "Tries to catch a wild Pokémon.  Success rate is 1.5×.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/great-ball.png'],
        [3, 'Ultra Ball', 800, "Tries to catch a wild Pokémon.  Success rate is 2×.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/ultra-ball.png'],
        [4, 'Master Ball', 5000, "Catches a wild Pokémon every time.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/master-ball.png'],

        [11, 'Potion', 200, "Restores 20 HP.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/potion.png'],
        [12, 'Super Potion', 700, "Restores 50 HP.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/super-potion.png'],
        [13, 'Hyper Potion', 1500, "Restores 200 HP.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/hyper-potion.png'],
        [14, 'Max Potion', 2500, "Restores HP to full.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/max-potion.png'],
        [15, 'Full Restore', 3000, "Restores HP to full and … ailment and confusion.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/full-restore.png'],

        [21, 'Full Heal', 400, "Cures any status ailment and confusion.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/full-heal.png'],

        [31, 'Ether', 1200, "Restores 10 PP for one move.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/ether.png'],
        [32, 'Max Ether', 2000, "Restores PP to full for one move.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/max-ether.png'],
        [33, 'Elixir', 3000, "Restores 10 PP for each move.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/elixir.png'],
        [34, 'Max Elixir', 4500, "Restores PP to full for each move.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/max-elixir.png'],

        [41, 'Revive', 2000, "Revives with half HP.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/revive.png'],
        [42, 'Max Revive', 4000, "Revives with full HP.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/max-revive.png'],
        [43, 'Sacred Ash', 50000, "Revives all fainted Pokémon with full HP.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/sacred-ash.png']
    ];

    public function getAllItems(): array
    {
        $items = [];

        foreach(self::DATA as $itemData) {
            $item = new Item();
            $item
            ->setId($itemData[0])
            ->setName($itemData[1])
            ->setCost($itemData[2])
            ->setEffect($itemData[3])
            ->setSprite($itemData[4]);

            $items[] = $item;
        }

        return $items;
    }
}