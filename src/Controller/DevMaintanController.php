<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DevMaintanController extends AbstractController
{
    #[Route('/dev_maintan', name: 'app_dev_maintan')]
    public function index(): Response
    {
        return $this->render('dev_maintan/index.html.twig', [
            'controller_name' => 'Dev_Maintan_Controller',
        ]);
    }
}
