<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaneladminController extends AbstractController
{
    /**
     * @Route("/paneladmin", name="paneladmin")
     */
    public function index(): Response
    {
        return $this->render('paneladmin/index.html.twig', [
            'controller_name' => 'PaneladminController',
        ]);
    }
}
