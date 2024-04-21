<?php

namespace App\Controller;

use App\Entity\Notification;
use App\Entity\Weatherdata;
use App\Form\UpdateWeatherDataRowFormType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MeldingenController extends AbstractController
{
    #[Route('/meldingen', name: 'app_meldingen')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        // Get the entity manager
        $notificationRepository = $doctrine->getRepository(Notification::class);

        // Retrieve all notifications
        $meldingen = $notificationRepository->findAll();
        $notificationCount = count($meldingen);
        return $this->render('meldingen/index.html.twig', [
            'meldingen' => $meldingen,
            'notificationCount' => $notificationCount,
        ]);
    }


    #[Route('/meldingen/melding-oplossen/{id}', name: 'app_melding_oplossen')]
    public function meldingOplossen(Request $request, EntityManagerInterface $entityManager, int $id): Response
    {
        $weatherDataRow = $entityManager->getRepository(Weatherdata::class)->find($id);

        if (!$weatherDataRow) {
            return new Response("Weatherdata not found", Response::HTTP_NOT_FOUND);
        }

        $form = $this->createForm(UpdateWeatherDataRowFormType::class, $weatherDataRow);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            // Redirect to the app_meldingen route
            return $this->redirectToRoute('app_meldingen');
        }

        return $this->render('meldingen/melding-oplossen.html.twig', [
            'form' => $form->createView(),
            'weatherDataRow' => $weatherDataRow,
        ]);
    }

    #[Route('/meldingen/delete/{id}', name: 'melding_verwijderen')]
    public function deleteMelding(int $id, EntityManagerInterface $entityManager): Response
    {
        // Find the notification by ID
        $notification = $entityManager->getRepository(Notification::class)->find($id);

        // If the notification doesn't exist, return a 404 response
        if (!$notification) {
            return new Response("Notification not found", Response::HTTP_NOT_FOUND);
        }

        // Remove the notification
        $entityManager->remove($notification);

        // Persist the changes
        $entityManager->flush();

        // Redirect back to the meldingen page
        return $this->redirectToRoute('app_meldingen');
    }


    #[Route('/meldingen/update-status/{id}/{status}', name: 'update_melding_status')]
    public function updateMeldingStatus(int $id, string $status, EntityManagerInterface $entityManager): Response
    {
        $notification = $entityManager->getRepository(Notification::class)->find($id);

        if (!$notification) {
            return new Response("Notification not found", Response::HTTP_NOT_FOUND);
        }

        // Update the status
        $notification->setStatus($status);

        // Persist changes
        $entityManager->flush();

        // Redirect back to the meldingen page
        return $this->redirectToRoute('app_meldingen');
    }

}
