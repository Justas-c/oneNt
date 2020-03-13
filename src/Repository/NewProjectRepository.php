<?php

namespace App\Repository;

use App\Entity\NewProject;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NewProject|null find($id, $lockMode = null, $lockVersion = null)
 * @method NewProject|null findOneBy(array $criteria, array $orderBy = null)
 * @method NewProject[]    findAll()
 * @method NewProject[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewProjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NewProject::class);
    }

    // /**
    //  * @return NewProject[] Returns an array of NewProject objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NewProject
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
