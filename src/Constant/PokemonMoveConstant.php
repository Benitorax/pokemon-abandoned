<?php
namespace App\Constant;

class PokemonMoveConstant
{
    const DAMAGE_CLASS_STATUS = 1;
    const DAMAGE_CLASS_PHYSICAL = 2;
    const DAMAGE_CLASS_SPECIAL = 3;

    const CATEGORY_AILMENT = 1;
    const CATEGORY_NET_GOOD_STATS = 2;
    const CATEGORY_HEAL = 3;
    const CATEGORY_DAMAGE_AND_AILMENT = 4;
    const CATEGORY_SWAGGER = 5;
    const CATEGORY_DAMAGE_AND_LOWER = 6;
    const CATEGORY_DAMAGE_AND_RAISE = 7;
    const CATEGORY_DAMAGE_AND_HEAL = 8;
    const CATEGORY_OHKO = 9;
    const CATEGORY_WHOLE_FIELD_EFFECT = 10;
    const CATEGORY_FIELD_EFFECT = 11;
    const CATEGORY_FORCE_SWITCH = 12;
    const CATEGORY_UNIQUE = 13;

    const TARGET_SPECIFIC_MOVE = 1;
    const TARGET_SELECTED_POKEMON_ME_FIRST = 2;
    const TARGET_ALLY = 3;
    const TARGET_USERS_FIELD = 4;
    const TARGET_USER_OR_ALLY = 5;
    const TARGET_OPPONENTS_FIELD = 6;
    const TARGET_USER = 7;
    const TARGET_RANDOM_OPPONENT = 8;
    const TARGET_ALL_OTHER_POKEMON = 9;
    const TARGET_SELECTED_POKEMON = 10;
    const TARGET_ALL_OPPONENTS = 11;
    const TARGET_ENTIRE_FIELD = 12;
    const TARGET_USER_AND_ALLIES = 13;
    const TARGET_ALL_POKEMON = 14;

    const AILMENT_NONE = 0;
    const AILMENT_PARALYSIS = 1;
    const AILMENT_SLEEP = 2;
    const AILMENT_FREEZE = 3;
    const AILMENT_BURN = 4;
    const AILMENT_POISON = 5;
    const AILMENT_CONFUSION = 6;
    const AILMENT_INFATUATION = 7;
    const AILMENT_TRAP = 8;
    const AILMENT_NIGHTMARE = 9;
    const AILMENT_TORMENT = 12;
    const AILMENT_DISABLE = 13;
    const AILMENT_YAWN = 14;
    const AILMENT_HEAL_BLOCK = 15;
    const AILMENT_NO_TYPE_ARGUMENT = 17;
    const AILMENT_LEECH_SEED = 18;
    const AILMENT_EMBARGO = 19;
    const AILMENT_PERISH_SONG = 20;
    const AILMENT_INGRAIN = 21;

    const TYPE_NORMAL = 1;
    const TYPE_FIGHTING = 2;
    const TYPE_FLYING = 3;
    const TYPE_POISON = 4;
    const TYPE_GROUND = 5;
    const TYPE_ROCK = 6;
    const TYPE_BUG = 7;
    const TYPE_GHOST = 8;
    const TYPE_STEEL = 9;
    const TYPE_FIRE = 10;
    const TYPE_WATER = 11;
    const TYPE_GRASS = 12;
    const TYPE_ELECTRIC = 13;
    const TYPE_PSYCHIC = 14;
    const TYPE_ICE = 15;
    const TYPE_DRAGON = 16;
    const TYPE_DARK = 17;
    const TYPE_FAIRY = 18;
}
/*
Generation1
    main region: kanto
    move: 1-165
    pokemon: 1-151
    type: 1-15
    version: red-blue, yellow

2
    main region: johto
    move: 166-251
    pokemon: 152-251
    type: 2(1)
    version: gold-silver, crystal  
3
    ability: 1-76
    item: 1-241
    main region: hoenn
    move: 252-354
    pokemon: 252-376
    type: (1)
    version: ruby-sapphire, emerald, firered-leafgreen, colosseum, xd
4
    ability: 77-123
    item: 242-500
    main region: sinnoh
    move: 355-467
    pokemon: 387-493
    type: 0
    version: diamond-pearl, platinum, heartgold-soulsilver
5
    ability: 124-164
    item: 
    main region: unova
    move: 468-559
    pokemon: 494-649
    type: 0
    version: black-white, black-2-white-2
6
    ability: 165-191
    item: 
    main region: kalos
    move: 560-621
    pokemon: 650-721
    type: 1
    version: x-y, omega-ruby-alpha-sapphire

item
    1:
    2:
    3: 1-241 (515 525 550 562)
    4: 242-514
    5: 563-681
    6: 682-749
    No 667, 672, 680
baby
    172,173,174,175,
    236,238,239,240,298,
    360,
    406,433,438,439,440,446,447,458
item
    1, Poke Ball, 200, "Tries to catch a wild Pokémon.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/poke-ball.png'
    2, Great Ball, 600, "Tries to catch a wild Pokémon.  Success rate is 1.5×.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/great-ball.png'
    3, Ultra Ball, 800, "Tries to catch a wild Pokémon.  Success rate is 2×.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/ultra-ball.png'
    4, Master Ball, 5000, "Catches a wild Pokémon every time.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/master-ball.png'

    11, Potion, 200, "Restores 20 HP.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/potion.png'
    12, Super Potion, 700, "Restores 50 HP.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/super-potion.png'
    13, Hyper Potion, 1500, "Restores 200 HP.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/hyper-potion.png'
    14, Max Potion, 2500, "Restores HP to full.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/max-potion.png'
    15, Full Restore, 3000, "Restores HP to full and … ailment and confusion.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/full-restore.png'

    21, Full Heal, 400, "Cures any status ailment and confusion.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/full-heal.png'

    31, Ether, 1200, "Restores 10 PP for one move.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/ether.png'
    32, Max Ether, 2000, "Restores PP to full for one move.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/max-ether.png'
    33, Elixir, 3000, "Restores 10 PP for each move.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/elixir.png'
    34, Max Elixir, 4500, "Restores PP to full for each move.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/max-elixir.png'

    41, Revive, 2000, "Revives with half HP.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/revive.png'
    42, Max Revive, 4000, "Revives with full HP.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/max-revive.png'
    43, Sacred Ash, 50000, "Revives all fainted Pokémon with full HP.", 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/sacred-ash.png'
*/



