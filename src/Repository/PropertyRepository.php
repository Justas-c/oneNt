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

    /**
     * Find property by params given.
     * Note: I added the loop because earlier code return arbitrary number of values to search on. I added small security feature
     * in controller to cancel query if any unfamiliar keys given.I'm sure there is better way to do it and I will rewrite it in the future.
     */
    public function findByParams($params)
    {
        $query = $this->createQueryBuilder('p');
        foreach ($params as $key => $value) {
            // TODO:
            if ($key == 'plotas') {
                // reik pagalvot nzn kolkas
            } else {
                $query->andWhere('p.' . $key . ' = :' . $key);
                $query->setParameter($key, $value);
            }
        }
        dump($query->getQuery());
        $result = $query->getQuery()->getResult();
        return $result;
    }
}
