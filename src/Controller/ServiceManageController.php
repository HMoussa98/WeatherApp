<?php

// src/Controller/ServiceManageController.php

namespace App\Controller;

use App\Repository\KlantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServiceManageController extends AbstractController
{
    #[Route('/service_manage', name: 'app_service_manage')]
    public function index(): Response
    {
        // Haal hier de klanten op uit de database of een andere bron
        $klanten = 'klanten'; // Vervang ... met je eigen logica om klanten op te halen

        return $this->render('service_manage/index.html.twig', [
            'klanten' => $klanten,
        ]);
    }
}

