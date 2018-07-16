<?php

namespace App\Controller;

use App\Entity\Page;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(EntityManagerInterface $entityManager, Request $request)
    {
        $pages = $entityManager->getRepository(Page::class)->findAllActivePages();
        foreach ($pages as $page) {

            echo $page->getTitle();
        }
        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
        ]);
    }
}
