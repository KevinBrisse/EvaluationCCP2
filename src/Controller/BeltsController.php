<?php

namespace App\Controller;

use App\Entity\Belts;
use App\Form\BeltsType;
use App\Repository\BeltsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/belts")
 */
class BeltsController extends AbstractController
{
    /**
     * @Route("/", name="belts_index", methods={"GET"})
     */
    public function index(BeltsRepository $beltsRepository): Response
    {
        return $this->render('belts/index.html.twig', [
            'belts' => $beltsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="belts_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $belt = new Belts();
        $form = $this->createForm(BeltsType::class, $belt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($belt);
            $entityManager->flush();

            return $this->redirectToRoute('belts_index');
        }

        return $this->render('belts/new.html.twig', [
            'belt' => $belt,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="belts_show", methods={"GET"})
     */
    public function show(Belts $belt): Response
    {
        return $this->render('belts/show.html.twig', [
            'belt' => $belt,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="belts_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Belts $belt): Response
    {
        $form = $this->createForm(BeltsType::class, $belt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('belts_index');
        }

        return $this->render('belts/edit.html.twig', [
            'belt' => $belt,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="belts_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Belts $belt): Response
    {
        if ($this->isCsrfTokenValid('delete'.$belt->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($belt);
            $entityManager->flush();
        }

        return $this->redirectToRoute('belts_index');
    }
}
