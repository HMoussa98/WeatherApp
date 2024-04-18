<?php
// src/Controller/KlantController.php

namespace App\Controller;

use App\Form\KlantType;
use App\Repository\KlantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Klant;

class KlantController extends AbstractController
{
    #[Route('/klant/manage', name: 'app_service_manage')]
    public function manage(KlantRepository $klantRepository): Response
    {
        $klant = $klantRepository->findAll();

        return $this->render('service_manage/index.html.twig', [
            'klant' => $klant,
        ]);
    }

    // Andere acties...


    #[Route('/klant_nieuw', name: 'klant_nieuw')]
    public function nieuw(Request $request, EntityManagerInterface $entityManager): Response
    {
        $klant = new Klant(); // Dit zou een instantie van de Klant entiteit moeten zijn
        $form = $this->createForm(KlantType::class, $klant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($klant);
            $entityManager->flush();

            $this->addFlash('success', 'Klant succesvol toegevoegd.');
            return $this->redirectToRoute('app_service_manage');
        }

        return $this->render('klant/klant_nieuw.html.twig', [
            'form' => $form->createView(),
        ]);
    }





    #[Route('/klant/verwijderen/{id}', name: 'klant_verwijderen', methods: ['POST'])]
    public function verwijderen(int $id, KlantRepository $klantRepository, EntityManagerInterface $entityManager): Response
    {
        $klant = $klantRepository->find($id);
        if (!$klant) {
            $this->addFlash('error', 'Klant niet gevonden.');
            return $this->redirectToRoute('app_service_manage');
        }

        $entityManager->remove($klant);
        $entityManager->flush();

        $this->addFlash('success', 'Klant succesvol verwijderd.');
        return $this->redirectToRoute('app_service_manage');
    }
}
