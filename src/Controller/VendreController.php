<?php

namespace App\Controller;

use App\Entity\Vendre;
use App\Entity\Article;
use App\Form\VendreType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/vendre')]
class VendreController extends AbstractController
{
    #[Route('/{annee}/{no}', name: 'app_vendre_index', methods: ['GET'])]
    public function index($annee, $no,EntityManagerInterface $entityManager): Response
    {
        $vendres = $entityManager
            ->getRepository(Vendre::class)
            // ->findAll();
            ->findByTicketId($annee, $no);

        return $this->render('vendre/index.html.twig', [
            'vendres' => $vendres, 'annee' =>$annee, 'no' =>$no,
        ]);
    }

    #[Route('/new/{annee}/{no}', name: 'app_vendre_new', methods: ['GET', 'POST'])]
    public function new($annee, $no,Request $request, EntityManagerInterface $entityManager): Response
    {
        $vendre = new Vendre();
        $vendre->setAnnee($annee);
        $vendre->setNumeroTicket($no);
        // dd($vendre);
        $form = $this->createForm(VendreType::class, $vendre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($vendre);
            $entityManager->flush();

            return $this->redirectToRoute('app_vendre_index', ['annee'=> $annee, 'no'=> $no], Response::HTTP_SEE_OTHER);
        }
 
        return $this->renderForm('vendre/new.html.twig', [
            'vendre' => $vendre,
            'form' => $form,
            'annee' => $annee,
            'no' => $no,
        ]);
    }

    #[Route('/{idArticle}', name: 'app_vendre_show', methods: ['GET'])]
    public function show(Vendre $vendre): Response
    {
        return $this->render('vendre/show.html.twig', [
            'vendre' => $vendre,
        ]);
    }

    #[Route('/edit/{annee}/{no}/{id}', name: 'app_vendre_edit', methods: ['GET', 'POST'])]
    public function edit($annee, $no,Article $id,Request $request, EntityManagerInterface $entityManager): Response
    {
        // OBLIGE de charger manuellement l'objet VENDRE
        $vendre = $entityManager->find("App\Entity\Vendre", array("annee" => $annee, "numeroTicket" => $no, "idArticle" => $id));
        // dd($vendre);

        $form = $this->createForm(VendreType::class, $vendre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // dd($_POST["vendre"]);
            $vendre->setAnnee($_POST["vendre"]["annee"]);
            $vendre->setNumeroTicket($_POST["vendre"]["numeroTicket"]);
            // $vendre->setIdArticle($_POST["vendre"]["idArticle"]);
            $vendre->setQuantite($_POST["vendre"]["quantite"]);
            $vendre->setPrixVente($_POST["vendre"]["prixVente"]);
  
            $entityManager->flush();

            return $this->redirectToRoute('app_vendre_index', ['annee'=> $annee, 'no'=> $no], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vendre/edit.html.twig', [
            'vendre' => $vendre,
            'form' => $form,
            'annee' => $annee,
            'no' => $no,
            'qte' => $vendre->getQuantite(),
            'prix' => $vendre->getPrixVente(),
        ]);
    }

    // #[Route('/{idArticle}', name: 'app_vendre_delete', methods: ['POST'])]
    // public function delete($annee, $no,Article $id,Request $request, Vendre $vendre, EntityManagerInterface $entityManager): Response
    #[Route('/{annee}/{no}/{id}', name: 'app_vendre_delete', methods: ['GET', 'POST'])]
    public function delete($annee, $no,Article $id,Request $request, EntityManagerInterface $entityManager): Response
    {
         // OBLIGE de charger manuellement l'objet VENDRE
         $vendre = $entityManager->find("App\Entity\Vendre", array("annee" => $annee, "numeroTicket" => $no, "idArticle" => $id));

        // dd($vendre);
        if ($this->isCsrfTokenValid('delete'.$vendre->getIdArticle(), $request->request->get('_token'))) {
            $entityManager->remove($vendre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_vendre_index', ['annee'=> $annee, 'no'=> $no], Response::HTTP_SEE_OTHER);
    }
}
