<?php

namespace App\Controller;

use App\Entity\Continent;
use App\Form\ContinentType;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/continent')]
class ContinentController extends AbstractController
{
    #[Route('/', name: 'app_continent_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {
        
        $continents = $entityManager
            ->getRepository(Continent::class)
            // ->findAll();
            ->findBy([], ['nomContinent' => 'asc']);

        return $this->render('continent/index.html.twig', [
            'continents' => $continents,
           
        ]);
    }

    #[Route('/new', name: 'app_continent_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $continent = new Continent();
        $form = $this->createForm(ContinentType::class, $continent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($continent);
            $entityManager->flush();

            // Generation du message d'alert 
            $this->addFlash(
                'success',
                'continent.new',
            );

            return $this->redirectToRoute('app_continent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('continent/new.html.twig', [
            'continent' => $continent,
            'form' => $form,
        ]);
    }

    #[Route('/{idContinent}', name: 'app_continent_show', methods: ['GET'])]
    public function show(Continent $continent): Response
    {
        return $this->render('continent/show.html.twig', [
            'continent' => $continent,
        ]);
    }

    #[Route('/{idContinent}/edit', name: 'app_continent_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Continent $continent, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContinentType::class, $continent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            // Generation du message d'alert 
            $this->addFlash(
                'success',
                'continent.edit',
            );

            return $this->redirectToRoute('app_continent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('continent/edit.html.twig', [
            'continent' => $continent,
            'form' => $form,
        ]);
    }

    #[Route('/{idContinent}', name: 'app_continent_delete', methods: ['POST'])]
    public function delete(Request $request, Continent $continent, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $continent->getIdContinent(), $request->request->get('_token'))) {
            $entityManager->remove($continent);
            $entityManager->flush();

            $this->addFlash(
                'success',
                'continent.delete',
            );
        }

        return $this->redirectToRoute('app_continent_index', [], Response::HTTP_SEE_OTHER);
    }
}
