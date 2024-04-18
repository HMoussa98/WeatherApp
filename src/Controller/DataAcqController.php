<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DataAcqController extends AbstractController
{   
    #[Route('/data_acq', name: 'app_data_acq')]
    public function index(): Response
    {
        return $this->render('data_acq/index.html.twig', [
            'controller_name' => 'DataAcqController',
        ]);
    }
}
