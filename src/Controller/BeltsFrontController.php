<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BeltsFrontController extends AbstractController
{
    /**
     * @Route("/belts", name="belts")
     */
    public function index(): Response
    {
        return $this->render('beltsfront/index.html.twig', [
            'controller_name' => 'BeltsController',
        ]);
    }
}
