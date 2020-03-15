<?php

namespace App\Repository;

use App\Entity\Property;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;

/**
 * @method Property|null find($id, $lockMode = null, $lockVersion = null)
 * @method Property|null findOneBy(array $criteria, array $orderBy = null)
 * @method Property[]    findAll()
 * @method Property[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Property::class);
    }

    public function findByOneParam($tipas)
    {
        return $this->createQueryBuilder('p')
        ->andWhere('p.type = :tipas')
        ->setParameter('tipas', $tipas)
        ->getQuery()
        ->getResult()
        ;
    }

    public function findByParams($params)
    {
        $query = $this->createQueryBuilder('p');
        foreach ($params as $key => $value) {
            // TODO:
            if ($key == 'plotas') {
                // reik pagalvot

            } else {
                $query->andWhere('p.' . $key . ' = :' . $key);
                $query->setParameter($key, $value);
            }
        }
        dump($query->getQuery());
        $result = $query->getQuery()->getResult();

        // /dd($result);
        // $jsonEncoded = json_encode($result);
        //dd($jsonEncoded);
        // echo "<pre>";
        // print_r($jsonEncoded);
        // echo '</pre>';
        //die('gg');

        // $response = new Response();
        // // set content type application_json.
        // return $response;
        //
        return $result;


        // $response = new Response();
        // $response->setContent(json_encode($result));
        // $response->headers->set('Content-Type', 'application/json');
        //
        // return $response;
    }


    //dd($query->getQuery());


    // foreach ($params as $param) {
    //     $query->andWhere('p.' . $param . )
    // }
    // ---------------------------------------From stack overflow
    // $query = $em->createQuery('SELECT u FROM Users u WHERE u.id IN (:id)');
    // $query->setParameter('id', array(1, 9));
    // $users = $query->getResult();
    // ------------------------------------------


    // $query = $this->createQueryBuilder('p')
    // ->andWhere('p.type = :tipas')
    // ->andWhere('p.miestas = :miestas')
    // ->setParameter('tipas', 'butai')
    // ->setParameter('miestas', 'Vilnius')
    // ->getQuery()
    // ->getResult()
    // ;
    //
    // dd($query->getQuery());
    // return $query;

    // return $this->createQueryBuilder('p')
    // ->andWhere('p.type = :tipas')
    // ->andWhere('p.miestas = :miestas')
    // ->andWhere('p.irengimas = :apdaila')
    // ->setParameter('tipas', $tipas)
    // ->setParameter('miestas', $miestas)
    // ->setParameter('apdaila', $apdaila)
    // ->getQuery()
    // ->getResult()
    // ;

    // public function findByExampleField($value)
    // {
    //     return $this->createQueryBuilder('p')
    //         ->andWhere('p.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->orderBy('p.id', 'ASC')
    //         ->setMaxResults(10)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }





    // /**
    //  * @return Properties[]
    //  */
    //  public function findPropertiesByType($type): array
    //  {
    //      $em = $this->getEntityManger();
    //      dd($em);
    //
    //  }
    //
    // // example:
    // /**
    //  * @return Product[]
    //  */
    // public function findAllGreaterThanPrice($price): array
    // {
    //     $entityManager = $this->getEntityManager();
    //
    //     $query = $entityManager->createQuery(
    //         'SELECT p
    //         FROM App\Entity\Product p
    //         WHERE p.price > :price
    //         ORDER BY p.price ASC'
    //     )->setParameter('price', $price);
    //
    //     // returns an array of Product objects
    //     return $query->getResult();
    // }

    // /**
    //  * @return Property[] Returns an array of Property objects
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
    public function findOneBySomeField($value): ?Property
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
