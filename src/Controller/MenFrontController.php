<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenFrontController extends AbstractController
{
    /**
     * @Route("/men", name="men")
     */
    public function index(): Response
    {
        return $this->render('menfront/index.html.twig', [
            'controller_name' => 'MenController',
        ]);
    }
}
