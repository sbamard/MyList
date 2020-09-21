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
     * @return array
     */
    public function findLatestEntriesAmiibo(): array
    {
        return $this->createQueryBuilder('p')
            ->setMaxResults(5)
            ->orderBy('p.updated_at', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findAllBySerie(): array
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.serie', 'ASC')
            ->getQuery()
            ->getResult();
    }

}
