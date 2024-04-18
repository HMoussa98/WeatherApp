<?php
// src/Controller/AbboController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AbboController extends AbstractController
{
    #[Route('/abonnement/bewerken', name: 'abonnement_bewerken')]
    public function bewerken(): Response
    {
        return $this->render('klant/abbo_bewerken.html.twig');
    }
}
