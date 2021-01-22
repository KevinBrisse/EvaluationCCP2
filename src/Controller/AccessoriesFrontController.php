<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccessoriesFrontController extends AbstractController
{
    /**
     * @Route("/accessories", name="accessories")
     */
    public function index(): Response
    {
        return $this->render('accessoriesfront/index.html.twig', [
            'controller_name' => 'AccessoriesController',
        ]);
    }
}
