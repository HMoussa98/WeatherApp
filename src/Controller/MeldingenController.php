<?php

namespace App\Controller;

use App\Entity\Notification;
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

        return $this->render('meldingen/index.html.twig', [
            'meldingen' => $meldingen,
        ]);
    }
}
