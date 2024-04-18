<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Form\UpdateUserFormType;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->redirectToRoute('app_admin_dash');
    }

    #[Route('/admin/dashboard', name: 'app_admin_dash')]
    public function dashboard(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Users::class);
        $records = $repository->findAll();

        return $this->render('admin/index.html.twig', [
            'records' => $records,
        ]);
    }

    #[Route('/admin/dashboard/edit_user/{id}', name: 'user_edit')]
    public function updateUser(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, int $id): Response
    {
        $user = $entityManager->getRepository(Users::class)->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                'No user found for id '.$id
            );
        }

        // $user->setName('New product name!');
        // $entityManager->flush();

        $form = $this->createForm(UpdateUserFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_dash');
        }

        return $this->render('admin/updateUser.html.twig', [
            'form' => $form,
            'user' => $user
        ]);
    }
}
