<?php

namespace App\Repository;

use App\Entity\GameSave;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GameSave|null find($id, $lockMode = null, $lockVersion = null)
 * @method GameSave|null findOneBy(array $criteria, array $orderBy = null)
 * @method GameSave[]    findAll()
 * @method GameSave[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GameSaveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GameSave::class);
    }

    // /**
    //  * @return GameSave[] Returns an array of GameSave objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GameSave
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
