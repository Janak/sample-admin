<?php
namespace App\Tests\Repository;

use App\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductionCapacityRepositoryTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;


    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }


    public function testValidateCollection()
    {
        $products = $this->entityManager
            ->getRepository(Page::class)
            ->findAllActivePages()
        ;

        $this->assertCount(7, $products);
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null; // avoid memory leaks
    }
}
