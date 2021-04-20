<?php

namespace App\Repository;

use App\Entity\CharacterItem;
use App\Entity\GameSave;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CharacterItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method CharacterItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method CharacterItem[]    findAll()
 * @method CharacterItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CharacterItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CharacterItem::class);
    }

    // /**
    //  * @return CharacterItem[] Returns an array of CharacterItem objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CharacterItem
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */


    public function retrieveInventory(GameSave $gameSave) {
        return $this->createQueryBuilder('c')
            ->andWhere('c.save = :val')
            ->setParameter('val', $gameSave)
            ->getQuery()
            ->execute()
        ;
    }

}
