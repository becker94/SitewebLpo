<?php

namespace App\Controller;

use App\Entity\Metier;
use App\Form\MetierType;
use App\Repository\MetierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/metier')]
class MetierController extends AbstractController
{
    #[Route('/', name: 'app_metier_index', methods: ['GET'])]
    public function index(MetierRepository $metierRepository): Response
    {
        return $this->render('metier/index.html.twig', [
            'metiers' => $metierRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_metier_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MetierRepository $metierRepository): Response
    {
        $metier = new Metier();
        $form = $this->createForm(MetierType::class, $metier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $metierRepository->save($metier, true);

            return $this->redirectToRoute('app_metier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('metier/new.html.twig', [
            'metier' => $metier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_metier_show', methods: ['GET'])]
    public function show(Metier $metier): Response
    {
        return $this->render('metier/show.html.twig', [
            'metier' => $metier,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_metier_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Metier $metier, MetierRepository $metierRepository): Response
    {
        $form = $this->createForm(MetierType::class, $metier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $metierRepository->save($metier, true);

            return $this->redirectToRoute('app_metier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('metier/edit.html.twig', [
            'metier' => $metier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_metier_delete', methods: ['POST'])]
    public function delete(Request $request, Metier $metier, MetierRepository $metierRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$metier->getId(), $request->request->get('_token'))) {
            $metierRepository->remove($metier, true);
        }

        return $this->redirectToRoute('app_metier_index', [], Response::HTTP_SEE_OTHER);
    }
}
