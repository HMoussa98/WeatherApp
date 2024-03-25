<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ServiceManageController extends AbstractController
{
    #[Route('/service/manage', name: 'app_service_manage')]
    public function index(): Response
    {
        return $this->render('service_manage/index.html.twig', [
            'controller_name' => 'ServiceManageController',
        ]);
    }
}
