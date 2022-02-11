<?php

namespace App\Controller;

use App\Entity\Alimentations;
use App\Form\AlimentationsType;
use App\Repository\AlimentationsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/alimentations/manager")
 */
class AlimentationsManagerController extends AbstractController
{
    /**
     * @Route("/", name="alimentations_manager_index", methods={"GET"})
     */
    public function index(AlimentationsRepository $alimentationsRepository): Response
    {
        return $this->render('alimentations_manager/index.html.twig', [
            'alimentations' => $alimentationsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="alimentations_manager_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $alimentation = new Alimentations();
        $form = $this->createForm(AlimentationsType::class, $alimentation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($alimentation);
            $entityManager->flush();

            return $this->redirectToRoute('alimentations_manager_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('alimentations_manager/new.html.twig', [
            'alimentation' => $alimentation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="alimentations_manager_show", methods={"GET"})
     */
    public function show(Alimentations $alimentation): Response
    {
        return $this->render('alimentations_manager/show.html.twig', [
            'alimentation' => $alimentation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="alimentations_manager_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Alimentations $alimentation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AlimentationsType::class, $alimentation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('alimentations_manager_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('alimentations_manager/edit.html.twig', [
            'alimentation' => $alimentation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="alimentations_manager_delete", methods={"POST"})
     */
    public function delete(Request $request, Alimentations $alimentation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$alimentation->getId(), $request->request->get('_token'))) {
            $entityManager->remove($alimentation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('alimentations_manager_index', [], Response::HTTP_SEE_OTHER);
    }
}
