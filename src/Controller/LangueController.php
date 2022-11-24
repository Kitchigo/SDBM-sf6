<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LangueController extends AbstractController
{
    #[Route('/langue/francais', name: 'langue_francais')]
    public function francais(Request $request): Response
    {
        $request->getSession()->set('_locale', 'fr');

        return $this->redirect($request->server->get('HTTP_REFERER'));
    }

    #[Route('/langue/anglais', name: 'langue_anglais')]
    public function anglais(Request $request): Response
    {
        $request->getSession()->set('_locale', 'en');

        return $this->redirect($request->server->get('HTTP_REFERER'));
    }
}
