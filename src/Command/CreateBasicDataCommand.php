<?php

namespace App\Command;

use App\Service\PokeApi\PokeApi;
use App\Service\PokeApi\ItemBuilder;
use App\Service\PokeApi\MoveBuilder;
use App\Service\PokeApi\StatBuilder;
use App\Service\PokeApi\TypeBuilder;
use App\Service\PokeApi\AbilityBuilder;
use App\Service\PokeApi\HabitatBuilder;
use App\Service\PokeApi\PokemonBuilder;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\PokeApi\EvolutionChainBuilder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateBasicDataCommand extends Command
{
    protected static $defaultName = 'app:create-basic-data';
    private $entityManager;
    private $pokemonBuilder;
    private $habitatBuilder;
    private $typeBuilder;
    private $moveBuilder;
    private $statBuilder;
    private $abilityBuilder;
    //private $pokeApi;
    private $evolutionChainBuilder;
    private $itemBuilder;

    public function __construct(
        EntityManagerInterface $entityManager,
        PokemonBuilder $pokemonBuilder, 
        HabitatBuilder $habitatBuilder,
        TypeBuilder $typeBuilder,
        MoveBuilder $moveBuilder,
        StatBuilder $statBuilder,
        AbilityBuilder $abilityBuilder,
        EvolutionChainBuilder $evolutionChainBuilder,
        ItemBuilder $itemBuilder
        //PokeApi $pokeApi
    ) {
        //$this->pokeApi = $pokeApi;
        $this->entityManager = $entityManager;
        $this->pokemonBuilder = $pokemonBuilder;
        $this->habitatBuilder = $habitatBuilder;
        $this->typeBuilder = $typeBuilder;
        $this->moveBuilder = $moveBuilder;
        $this->statBuilder = $statBuilder;
        $this->abilityBuilder = $abilityBuilder;
        $this->evolutionChainBuilder = $evolutionChainBuilder;
        $this->itemBuilder = $itemBuilder;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Create basic data before testing the app')
            //->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            //->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        // $arg1 = $input->getArgument('arg1');

        // if ($arg1) {
        //     $io->note(sprintf('You passed an argument: %s', $arg1));
        // }

        // if ($input->getOption('option1')) {
        //     // ...
        // }

        // for($i=151; $i<649; $i++) {
        //     $data = $this->pokeApi->fetchPokemonSpecies($i);
        //     //$io->write('-'.$i.': '.$data['is_baby'].'-');
        // }

        $this->createAllItem($io);
        // $this->createAllEvolutionChain($io);
        // $this->createAllAbility($io);
        // $this->createAllStat($io);
        // $this->createAllType($io);
        // $this->createAllMove($io);
        // $this->createAllHabitat($io);
        // $this->createAllPokemonModel($io);
        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return 0;
    }

    public function createAllItem(SymfonyStyle $io): void
    {
        $items = $this->itemBuilder->getAllItems();
        foreach($items as $item) {
            $this->entityManager->persist($item);
        }

        $this->entityManager->flush();
        $io->writeln('Items created : '.count($items));
    }

    public function createAllEvolutionChain(SymfonyStyle $io): void
    {
        $evolutionChainsCreated = 0;
        for($i=1 ; $i < 337; $i++) {
            if(in_array($i, [210, 222, 225, 226, 227, 231, 238, 251])) continue;
            $evolutionChain = $this->evolutionChainBuilder->createEvolutionChain($i);// 18 57 67 135 140
            $this->entityManager->persist($evolutionChain);
            if($i%20 === 0) {
                $this->entityManager->flush();
                $this->entityManager->clear();
                $io->writeln('Evolution chains created: '.$i);
            }
            $evolutionChainsCreated = $i;
        }

        $this->entityManager->flush();
        $io->writeln('Evolution chains created: '.$evolutionChainsCreated);
    }

    public function createAllAbility(SymfonyStyle $io): void
    {
        $abilitiesCreated = 0;
        for($i=1 ; $i < 165; $i++) {
            $type = $this->abilityBuilder->createAbility($i);
            $this->entityManager->persist($type);
            if($i%20 === 0) {
                $this->entityManager->flush();
                $this->entityManager->clear();
                $io->writeln('Abilities created: '.$i);
            }
            $abilitiesCreated = $i;
        };

        $this->entityManager->flush();
        $io->writeln('Abilities created: '.$abilitiesCreated);
    }

    public function createAllStat(SymfonyStyle $io): void
    {
        $statCreated = 0;
        for($i=1 ; $i < 9; $i++) {
            $type = $this->statBuilder->createStat($i);
            $this->entityManager->persist($type);
            $statCreated = $i;
        };

        $this->entityManager->flush();
        $io->writeln('Stats created: '.$statCreated);
    }

    public function createAllType(SymfonyStyle $io): void
    {
        $typeCreated = 0;
        for($i=1 ; $i < 19; $i++) {
            $type = $this->typeBuilder->createType($i);
            $this->entityManager->persist($type);
            $typeCreated = $i;
        };

        $this->entityManager->flush();
        $io->writeln('Types created: '.$typeCreated);
    }

    public function createAllMove(SymfonyStyle $io): void
    {
        $moveCreated = 0;
        for($i=1 ; $i < 560; $i++) {
            $move = $this->moveBuilder->createMove($i);
            $this->entityManager->persist($move);
            if($i%20 === 0) {
                $this->entityManager->flush();
                $this->entityManager->clear();
                $io->writeln('Moves created: '.$i);
            }
            $moveCreated = $i;
        };

        $this->entityManager->flush();
        $io->writeln('Moves created: '.$moveCreated);
    }

    public function createAllHabitat(SymfonyStyle $io): void
    {
        $habitatCreated = 0;
        for($i=1 ; $i < 10; $i++) {
            $habitat = $this->habitatBuilder->createHabitat($i);
            $this->entityManager->persist($habitat);
            $habitatCreated = $i;
        };

        $this->entityManager->flush();  
        $io->writeln('Habitat created: '.$habitatCreated);
    }

    public function createAllPokemonModel(SymfonyStyle $io): void
    {
        $pokemonModelCreated = 0;
        for($i=1 ; $i < 650; $i++) {
            $pokemon = $this->pokemonBuilder->createPokemonModel($i);
            $this->entityManager->persist($pokemon);
            if($i%20 === 0) {
                $this->entityManager->flush();
                $this->entityManager->clear();
                $io->writeln('Pokemon models created: '.$i);
            }
            $pokemonModelCreated = $i;
        };

        $this->entityManager->flush();
        $io->writeln('Pokemon models created: '.$pokemonModelCreated);
    }
}
