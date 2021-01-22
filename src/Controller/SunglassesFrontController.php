<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SunglassesFrontController extends AbstractController
{
    /**
     * @Route("/sunglasses", name="sunglasses")
     */
    public function index(): Response
    {
        return $this->render('sunglassesfront/index.html.twig', [
            'controller_name' => 'SunglassesController',
        ]);
    }
}
