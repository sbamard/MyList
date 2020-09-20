<?php

namespace App\Repository;

use App\Entity\Amiibo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Amiibo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Amiibo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Amiibo[]    findAll()
 * @method Amiibo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AmiiboRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Amiibo::class);
    }

    // /**
    //  * @return Amiibo[] Returns an array of Amiibo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Amiibo
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
