<?php

namespace App\Repository;

use App\Entity\Page;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * @method Page|null find($id, $lockMode = null, $lockVersion = null)
 * @method Page|null findOneBy(array $criteria, array $orderBy = null)
 * @method Page[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PageRepository extends ServiceEntityRepository
{
    use TranslationQueryTrait;

    public function __construct(RegistryInterface $registry, ParameterBagInterface $parameterBag)
    {
        $this->defaultLocale = $parameterBag->get('locale');
        parent::__construct($registry, Page::class);
    }

    public function findAll()
    {
        $qb = $this->createQueryBuilder('page');
        return $this->getResult($qb, $this->defaultLocale);
    }

    /**
     * Returns active pages
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function findAllActivePages()
    {
        $qb = $this->createQueryBuilder("p");

        $qb
            ->where("p.is_active = :active")
            ->setParameter('active', true);

        return $this->getResult($qb, $this->defaultLocale);
    }
}
