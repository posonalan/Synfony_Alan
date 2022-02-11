<?php

namespace App\Controller;

use App\Entity\Animaux;
use App\Form\AnimauxType;
use App\Repository\AnimauxRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/animaux/manager")
 */
class AnimauxManagerController extends AbstractController
{
    /* route pour la nav */ 
    /**
     * @Route("/", name="animaux_manager_index", methods={"GET"})
     */
    public function index(AnimauxRepository $animauxRepository): Response
    {
        return $this->render('animaux_manager/index.html.twig', [
            'animauxes' => $animauxRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="animaux_manager_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $animaux = new Animaux();
        $form = $this->createForm(AnimauxType::class, $animaux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($animaux);
            $entityManager->flush();

            return $this->redirectToRoute('animaux_manager_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('animaux_manager/new.html.twig', [
            'animaux' => $animaux,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="animaux_manager_show", methods={"GET"})
     */
    public function show(Animaux $animaux): Response
    {
        return $this->render('animaux_manager/show.html.twig', [
            'animaux' => $animaux,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="animaux_manager_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Animaux $animaux, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AnimauxType::class, $animaux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('animaux_manager_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('animaux_manager/edit.html.twig', [
            'animaux' => $animaux,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="animaux_manager_delete", methods={"POST"})
     */
    public function delete(Request $request, Animaux $animaux, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$animaux->getId(), $request->request->get('_token'))) {
            $entityManager->remove($animaux);
            $entityManager->flush();
        }

        return $this->redirectToRoute('animaux_manager_index', [], Response::HTTP_SEE_OTHER);
    }
}
