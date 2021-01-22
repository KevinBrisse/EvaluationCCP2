<?php

namespace App\Controller;

use App\Entity\Accessories;
use App\Form\AccessoriesType;
use App\Repository\AccessoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/accessories")
 */
class AccessoriesController extends AbstractController
{
    /**
     * @Route("/", name="accessories_index", methods={"GET"})
     */
    public function index(AccessoriesRepository $accessoriesRepository): Response
    {
        return $this->render('accessories/index.html.twig', [
            'accessories' => $accessoriesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="accessories_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $accessory = new Accessories();
        $form = $this->createForm(AccessoriesType::class, $accessory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($accessory);
            $entityManager->flush();

            return $this->redirectToRoute('accessories_index');
        }

        return $this->render('accessories/new.html.twig', [
            'accessory' => $accessory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="accessories_show", methods={"GET"})
     */
    public function show(Accessories $accessory): Response
    {
        return $this->render('accessories/show.html.twig', [
            'accessory' => $accessory,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="accessories_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Accessories $accessory): Response
    {
        $form = $this->createForm(AccessoriesType::class, $accessory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('accessories_index');
        }

        return $this->render('accessories/edit.html.twig', [
            'accessory' => $accessory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="accessories_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Accessories $accessory): Response
    {
        if ($this->isCsrfTokenValid('delete'.$accessory->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($accessory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('accessories_index');
    }
}
