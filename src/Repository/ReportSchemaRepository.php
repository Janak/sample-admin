<?php

namespace App\Repository;

use App\Entity\ReportSchema;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ReportSchema|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReportSchema|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReportSchema[]    findAll()
 * @method ReportSchema[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReportSchemaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ReportSchema::class);
    }

    public static function getReportTypes()
    {
        return [
            'Aggregation Report' => ReportSchema::TYPE_AGREGATION,
            'Timeseriese Report' => ReportSchema::TYPE_TIMESERIESE,
        ];
    }
}
