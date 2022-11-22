<?php

namespace App\Controller;

use App\Entity\Couleur;
use App\Form\CouleurType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/couleur')]
class CouleurController extends AbstractController
{
    #[Route('/', name: 'app_couleur_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $couleurs = $entityManager
            ->getRepository(Couleur::class)
            ->findAll();

        return $this->render('couleur/index.html.twig', [
            'couleurs' => $couleurs,
        ]);
    }

    #[Route('/new', name: 'app_couleur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $couleur = new Couleur();
        $form = $this->createForm(CouleurType::class, $couleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($couleur);
            $entityManager->flush();

            return $this->redirectToRoute('app_couleur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('couleur/new.html.twig', [
            'couleur' => $couleur,
            'form' => $form,
        ]);
    }

    #[Route('/{idCouleur}', name: 'app_couleur_show', methods: ['GET'])]
    public function show(Couleur $couleur): Response
    {
        return $this->render('couleur/show.html.twig', [
            'couleur' => $couleur,
        ]);
    }

    #[Route('/{idCouleur}/edit', name: 'app_couleur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Couleur $couleur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CouleurType::class, $couleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_couleur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('couleur/edit.html.twig', [
            'couleur' => $couleur,
            'form' => $form,
        ]);
    }

    #[Route('/{idCouleur}', name: 'app_couleur_delete', methods: ['POST'])]
    public function delete(Request $request, Couleur $couleur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$couleur->getIdCouleur(), $request->request->get('_token'))) {
            $entityManager->remove($couleur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_couleur_index', [], Response::HTTP_SEE_OTHER);
    }
}
