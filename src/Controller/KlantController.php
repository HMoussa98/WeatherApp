<?php
// src/Controller/KlantController.php

namespace App\Controller;

use App\Entity\Klant;
use App\Form\KlantType;
use App\Repository\KlantRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;


class KlantController extends AbstractController
{
    #[Route('/klant_nieuw', name: 'klant_nieuw')]
    public function nieuw(Request $request, EntityManagerInterface $entityManager, LoggerInterface $logger): Response
    {
        $klant = new Klant(); // This should be an instance of the Klant entity
        $form = $this->createForm(KlantType::class, $klant);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $logger->debug('Form is submitted.');

            if ($form->isValid()) {
                $logger->debug('Form is valid. Saving the klant.');
                $entityManager->persist($klant);
                $entityManager->flush();

                $this->addFlash('success', 'Klant succesvol toegevoegd.');
                return $this->redirectToRoute('app_service_manage');
            } else {
                $logger->debug('Form is not valid.');
            }
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
