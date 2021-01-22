<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactsFrontController extends AbstractController
{
    /**
     * @Route("/contacts", name="contacts")
     */
    public function index(): Response
    {
        return $this->render('contactsfront/index.html.twig', [
            'controller_name' => 'ContactsController',
        ]);
    }
}
