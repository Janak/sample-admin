<?php

namespace App\Repository;

use App\Entity\ReportTotalAggregation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ReportTotalAggregation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReportTotalAggregation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReportTotalAggregation[]    findAll()
 * @method ReportTotalAggregation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReportTotalAggregationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ReportTotalAggregation::class);
    }

//    /**
//     * @return ReportTotalAggregation[] Returns an array of ReportTotalAggregation objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ReportTotalAggregation
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
