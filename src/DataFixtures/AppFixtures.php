<?php

namespace App\DataFixtures;

use App\Entity\Config;
use App\Entity\Page;
use App\Entity\PageTranslation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 0; $i < 20; $i++) {
            $page = new Page();

            $page->setTitle('Title Example en. '.$i);
            $page->setContent('Content example en.'.$i);
            $page->setIsActive(rand(0, 1));

            $page->addTranslation(new PageTranslation('fi', 'title', 'Title FI'));
            $page->addTranslation(new PageTranslation('fi', 'content', 'Content FI'));
            $manager->persist($page);
        }

        $manager->flush();


        // create 20 products! Bam!
        for ($i = 0; $i < 20; $i++) {
            $config = new Config();
            $config->setName('config-name-'.$i);
            $config->setValue('config-value-'.$i);

            $manager->persist($config);
        }

        $manager->flush();
    }
}
