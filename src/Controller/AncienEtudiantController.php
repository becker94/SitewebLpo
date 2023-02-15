<?php

namespace App\Controller;

use App\Entity\AncienEtudiant;
use App\Form\AncienEtudiantType;
use App\Repository\AncienEtudiantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/ancien/etudiant')]
class AncienEtudiantController extends AbstractController
{
    #[Route('/', name: 'app_ancien_etudiant_index', methods: ['GET'])]
    public function index(AncienEtudiantRepository $ancienEtudiantRepository): Response
    {
        return $this->render('ancien_etudiant/index.html.twig', [
            'ancien_etudiants' => $ancienEtudiantRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ancien_etudiant_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AncienEtudiantRepository $ancienEtudiantRepository): Response
    {
        $ancienEtudiant = new AncienEtudiant();
        $form = $this->createForm(AncienEtudiantType::class, $ancienEtudiant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ancienEtudiantRepository->save($ancienEtudiant, true);

            return $this->redirectToRoute('app_ancien_etudiant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ancien_etudiant/new.html.twig', [
            'ancien_etudiant' => $ancienEtudiant,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ancien_etudiant_show', methods: ['GET'])]
    public function show(AncienEtudiant $ancienEtudiant): Response
    {
        return $this->render('ancien_etudiant/show.html.twig', [
            'ancien_etudiant' => $ancienEtudiant,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ancien_etudiant_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AncienEtudiant $ancienEtudiant, AncienEtudiantRepository $ancienEtudiantRepository): Response
    {
        $form = $this->createForm(AncienEtudiantType::class, $ancienEtudiant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ancienEtudiantRepository->save($ancienEtudiant, true);

            return $this->redirectToRoute('app_ancien_etudiant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ancien_etudiant/edit.html.twig', [
            'ancien_etudiant' => $ancienEtudiant,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ancien_etudiant_delete', methods: ['POST'])]
    public function delete(Request $request, AncienEtudiant $ancienEtudiant, AncienEtudiantRepository $ancienEtudiantRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ancienEtudiant->getId(), $request->request->get('_token'))) {
            $ancienEtudiantRepository->remove($ancienEtudiant, true);
        }

        return $this->redirectToRoute('app_ancien_etudiant_index', [], Response::HTTP_SEE_OTHER);
    }
}
