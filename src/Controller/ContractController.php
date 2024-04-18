<?php

namespace App\Controller;

use App\Entity\Contract;
use App\Form\ContractType;
use App\Repository\ContractRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContractController extends AbstractController
{
    #[Route('/contract_index', name: 'contract_index')]
    public function index(ContractRepository $contractRepository): Response
    {
        $contracts = $contractRepository->findAll();

        return $this->render('klant/contract_index.html.twig', [
            'contracts' => $contracts,
        ]);
    }


}
