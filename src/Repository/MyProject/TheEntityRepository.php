<?php

namespace App\Repository\MyProject;

use App\Entity\MyProject\TheEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TheEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method TheEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method TheEntity[]    findAll()
 * @method TheEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TheEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TheEntity::class);
    }

    // /**
    //  * @return TheEntity[] Returns an array of TheEntity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TheEntity
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
