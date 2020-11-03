<?php

namespace App\Controller;

use App\Entity\Sav;
use App\Form\SavType;
use App\Repository\SavRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sav")
 */
class SavController extends AbstractController
{
    /**
     * @Route("/", name="sav_index", methods={"GET"})
     */
    public function index(SavRepository $savRepository): Response
    {
        return $this->render('sav/index.html.twig', [
            'savs' => $savRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="sav_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $sav = new Sav();
        $form = $this->createForm(SavType::class, $sav);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sav);
            $entityManager->flush();

            return $this->redirectToRoute('sav_index');
        }

        return $this->render('sav/new.html.twig', [
            'sav' => $sav,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sav_show", methods={"GET"})
     */
    public function show(Sav $sav): Response
    {
        return $this->render('sav/show.html.twig', [
            'sav' => $sav,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sav_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Sav $sav): Response
    {
        $form = $this->createForm(SavType::class, $sav);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sav_index');
        }

        return $this->render('sav/edit.html.twig', [
            'sav' => $sav,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sav_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Sav $sav): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sav->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sav);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sav_index');
    }
}
