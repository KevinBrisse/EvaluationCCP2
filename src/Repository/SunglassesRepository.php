<?php

namespace App\Repository;

use App\Entity\Sunglasses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sunglasses|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sunglasses|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sunglasses[]    findAll()
 * @method Sunglasses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SunglassesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sunglasses::class);
    }

    // /**
    //  * @return Sunglasses[] Returns an array of Sunglasses objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sunglasses
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
