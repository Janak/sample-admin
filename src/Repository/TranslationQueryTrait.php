<?php
namespace App\Repository;

use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query;
use Gedmo\Translatable\TranslatableListener;
use Doctrine\ORM\AbstractQuery;


trait TranslationQueryTrait
{
    /**
     * @var defaultLocale
     */
    protected $defaultLocale;

    /**
     * set default locale
     *
     * @param $locale
     * @return $this
     */
    public function setDefaultLocale($locale)
    {
        $this->defaultLocale = $locale;
        return $this;
    }

    /**
     * Returns translated one (or null if not found) result for given locale
     *
     * @param QueryBuilder $qb A Doctrine query builder instance
     * @param string  $locale  A locale name
     * @param string $hydrationMode A Doctrine result hydration mode
     *
     * @return QueryBuilder
     */
    public function getOneOrNullTResult(QueryBuilder $qb, $locale = null, $hydrationMode = null)
    {
        return $this->getTranslatedQuery($qb, $locale)->getOneOrNullResult($hydrationMode);
    }

    /**
     * Returns translated result for given locale
     *
     * @param QueryBuilder $qb A Doctrine query builder instance
     * @param string  $locale  A locale name
     * @param string $hydrationMode A Doctrine result hydration mode
     *
     * @return QueryBuilder
     */
    public function getResult(QueryBuilder $qb, $locale = null, $hydrationMode = AbstractQuery::HYDRATE_OBJECT)
    {
        return $this->getTranslatedQuery($qb, $locale)->getResult($hydrationMode);
    }

    /**
     * Returns translated array result for given locale
     *
     * @param QueryBuilder $qb A Doctrine query builder instance
     * @param string  $locale  A locale name
     *
     * @return QueryBuilder
     */
    public function getArrayResult(QueryBuilder $qb, $locale = null)
    {
        return $this->getTranslatedQuery($qb, $locale)->getArrayResult();
    }

    /**
     * Returns translated scalar result for given locale
     *
     * @param QueryBuilder $qb A Doctrine query builder instance
     * @param string  $locale  A locale name
     *
     * @return QueryBuilder
     */
    public function getScalarResult(QueryBuilder $qb, $locale = null)
    {
        return $this->getTranslatedQuery($qb, $locale)->getScalarResult();
    }

    /**
     * Returns translated single result for given locale
     *
     * @param QueryBuilder $qb A Doctrine query builder instance
     * @param string  $locale  A locale name
     * @param string $hydrationMode A Doctrine result hydration mode
     *
     * @return QueryBuilder
     */
    public function getSingleResult(QueryBuilder $qb, $locale = null, $hydrationMode = null)
    {
        return $this->getTranslatedQuery($qb, $locale)->getSingleResult($hydrationMode);
    }

    /**
     * Returns translated single scalar result for given locale
     *
     * @param QueryBuilder $qb A Doctrine query builder instance
     * @param string  $locale  A locale name
     *
     * @return QueryBuilder
     */
    public function getSingleScalarResult(QueryBuilder $qb, $locale = null)
    {
        return $this->getTranslatedQuery($qb, $locale)->getSingleScalarResult();
    }

    /**
     * Return translated doctrine query instance
     *
     * @param QueryBuilder $qb
     * @param null $locale
     *
     * @return Query
     */
    protected function getTranslatedQuery(QueryBuilder $qb, $locale = null)
    {
        $locale = null === $locale ? $this->defaultLocale : $locale;
        $query = $qb->getQuery();

        $query->setHint(
            Query::HINT_CUSTOM_OUTPUT_WALKER,
            'Gedmo\Translatable\Query\TreeWalker\TranslationWalker'
        );

        $query->setHint(TranslatableListener::HINT_TRANSLATABLE_LOCALE, $locale);
        return $query;
    }
}
