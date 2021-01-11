<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccessoriesController extends AbstractController
{
    /**
     * @Route("/accessories", name="accessories")
     */
    public function index(): Response
    {
        return $this->render('accessories/index.html.twig', [
            'controller_name' => 'AccessoriesController',
        ]);
    }
}
