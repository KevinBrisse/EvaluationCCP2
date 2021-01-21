<?php

namespace App\Repository;

use App\Entity\Belts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Belts|null find($id, $lockMode = null, $lockVersion = null)
 * @method Belts|null findOneBy(array $criteria, array $orderBy = null)
 * @method Belts[]    findAll()
 * @method Belts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BeltsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Belts::class);
    }

    // /**
    //  * @return Belts[] Returns an array of Belts objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Belts
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
