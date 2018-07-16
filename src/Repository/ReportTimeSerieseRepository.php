<?php

namespace App\Repository;

use App\Entity\ReportTimeSeriese;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ReportTimeSeriese|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReportTimeSeriese|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReportTimeSeriese[]    findAll()
 * @method ReportTimeSeriese[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReportTimeSerieseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ReportTimeSeriese::class);
    }

//    /**
//     * @return ReportTimeSeriese[] Returns an array of ReportTimeSeriese objects
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
    public function findOneBySomeField($value): ?ReportTimeSeriese
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
