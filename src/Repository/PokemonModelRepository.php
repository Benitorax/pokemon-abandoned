<?php

namespace App\Repository;

use App\Entity\PokemonModel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PokemonModel|null find($id, $lockMode = null, $lockVersion = null)
 * @method PokemonModel|null findOneBy(array $criteria, array $orderBy = null)
 * @method PokemonModel[]    findAll()
 * @method PokemonModel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PokemonModelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PokemonModel::class);
    }

    // /**
    //  * @return PokemonModel[] Returns an array of PokemonModel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PokemonModel
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
