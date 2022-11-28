<?php

namespace App\Controller;

use App\Entity\Fabricant;
use App\Form\FabricantType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/fabricant')]
class FabricantController extends AbstractController
{
    #[Route('/', name: 'app_fabricant_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $fabricants = $entityManager
            ->getRepository(Fabricant::class)
            ->findAll();

        return $this->render('fabricant/index.html.twig', [
            'fabricants' => $fabricants,
        ]);
    }

    #[Route('/new', name: 'app_fabricant_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $fabricant = new Fabricant();
        $form = $this->createForm(FabricantType::class, $fabricant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($fabricant);
            $entityManager->flush();

            // Generation du message d'alert 
            $this->addFlash(
                'success',
                'fabricant.new',
            );

            return $this->redirectToRoute('app_fabricant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fabricant/new.html.twig', [
            'fabricant' => $fabricant,
            'form' => $form,
        ]);
    }

    #[Route('/{idFabricant}', name: 'app_fabricant_show', methods: ['GET'])]
    public function show(Fabricant $fabricant): Response
    {
        return $this->render('fabricant/show.html.twig', [
            'fabricant' => $fabricant,
        ]);
    }

    #[Route('/{idFabricant}/edit', name: 'app_fabricant_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Fabricant $fabricant, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FabricantType::class, $fabricant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            // Generation du message d'alert 
            $this->addFlash(
                'success',
                'fabricant.edit',
            );

            return $this->redirectToRoute('app_fabricant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fabricant/edit.html.twig', [
            'fabricant' => $fabricant,
            'form' => $form,
        ]);
    }

    #[Route('/{idFabricant}', name: 'app_fabricant_delete', methods: ['POST'])]
    public function delete(Request $request, Fabricant $fabricant, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $fabricant->getIdFabricant(), $request->request->get('_token'))) {
            $entityManager->remove($fabricant);
            $entityManager->flush();

            $this->addFlash(
                'success',
                'fabricant.delete',
            );
        }

        return $this->redirectToRoute('app_fabricant_index', [], Response::HTTP_SEE_OTHER);
    }
}
