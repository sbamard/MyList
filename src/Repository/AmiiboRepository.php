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

    /**
     * @return int|mixed|string
     */
    public function findQuery(): array
    {
        return $this->createQueryBuilder('p')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }


}
