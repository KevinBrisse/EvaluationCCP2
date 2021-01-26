<?php

namespace App\Controller;

use App\Entity\Sunglasses;
use App\Form\SunglassesType;
use App\Repository\SunglassesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sunglasses_index")
 */
class SunglassesController extends AbstractController
{
    /**
     * @Route("/", name="sunglasses_index", methods={"GET"})
     */
    public function index(SunglassesRepository $sunglassesRepository): Response
    {
        return $this->render('sunglasses/index.html.twig', [
            'sunglasses' => $sunglassesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="sunglasses_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $sunglass = new Sunglasses();
        $form = $this->createForm(SunglassesType::class, $sunglass);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sunglass);
            $entityManager->flush();

            return $this->redirectToRoute('sunglasses_index');
        }

        return $this->render('sunglasses/new.html.twig', [
            'sunglass' => $sunglass,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sunglasses_show", methods={"GET"})
     */
    public function show(Sunglasses $sunglass): Response
    {
        return $this->render('sunglasses/show.html.twig', [
            'sunglass' => $sunglass,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sunglasses_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Sunglasses $sunglass): Response
    {
        $form = $this->createForm(SunglassesType::class, $sunglass);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sunglasses_index');
        }

        return $this->render('sunglasses/edit.html.twig', [
            'sunglass' => $sunglass,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sunglasses_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Sunglasses $sunglass): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sunglass->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sunglass);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sunglasses_index');
    }
}
