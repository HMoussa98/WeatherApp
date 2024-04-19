<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils, Request $request): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('index');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        
        return $this->render('security/login.html.twig', ['error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route(path: '/', name: 'index')]
    public function redirectTo(): Response
    {
        #ROLE_ADMIN
        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_admin');
        
        #ROLE_DATA_ACQUISITION
        } elseif ($this->isGranted('ROLE_DATA_ACQUISITION')) {
            return $this->redirectToRoute('app_data_acq');

        #ROLE_DEVELOPMENT_MAINTENANCE
        } elseif ($this->isGranted('ROLE_DEVELOPMENT_MAINTENANCE')) {
            return $this->redirectToRoute('app_dev_maintan');

        #ROLE_SERVICE_MANAGEMENT
        } elseif ($this->isGranted('ROLE_SERVICE_MANAGEMENT')) {
            return $this->redirectToRoute('app_service_manage');
        
        #No role
        } else {
            return $this->redirectToRoute('app_logout');
        }
    }
}
