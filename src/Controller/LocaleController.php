<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LocaleController extends Controller
{
    /**
     * @Route("/admin/{_locale}/locale-change", name="change_locale")
     */
    public function index(Request $request)
    {
        return $this->redirect($request->headers->get('referer'));
    }
}
