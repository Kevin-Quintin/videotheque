<?php

namespace App\Repository;

use App\Entity\Figurent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Figurent|null find($id, $lockMode = null, $lockVersion = null)
 * @method Figurent|null findOneBy(array $criteria, array $orderBy = null)
 * @method Figurent[]    findAll()
 * @method Figurent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FigurentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Figurent::class);
    }

    // /**
    //  * @return Figurent[] Returns an array of Figurent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Figurent
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
