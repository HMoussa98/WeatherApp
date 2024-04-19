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
    public function index (KlantRepository $klantRepository): Response
    {
        $klant = $klantRepository->findAll();

        return $this->render('service_manage/index.html.twig', [
            'klant' => $klant,
        ]);
    }
}
