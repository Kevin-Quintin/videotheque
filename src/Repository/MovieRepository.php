<?php

namespace App\Repository;

use App\Entity\Movie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\SearchMoviesType;
/**
 * @method Movie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movie[]    findAll()
 * @method Movie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Movie::class);
    }



    // /**
    //  * @return Movie[] Returns an array of Movie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

   /**
 * Recherch les video en fonction du formulaire
 * @return void
 */
    public function search($name)
    {
        $query = $this->createQueryBuilder('m');
        $query->where('m.active = 1');
        if($name == null){
            $query->andWhere('MATCH_AGAINST(m.name, m.description)AGAINST (:name boolean)>0')
            ->setParameter('name', $name);
        }
        return $query->getQuery()->getResult();
            
    }
   

    //   // Find/search movies by title/content
    //   public function findMoviesByName(string $name)
    //   {
    //       $qb = $this->createQueryBuilder('p');
    //       $qb
    //           ->where(
    //               $qb->expr()->andX(
    //                   $qb->expr()->orX(
    //                       $qb->expr()->like('p.title', ':name'),
    //                       $qb->expr()->like('p.content', ':name'),
    //                   ),
    //                   $qb->expr()->isNotNull('p.created_at')
    //               )
    //           )
    //           ->setParameter(':name', '%' . $name . '%')
    //       ;
    //       return $qb
    //           ->getQuery()
    //           ->getResult();
    //   }
}
