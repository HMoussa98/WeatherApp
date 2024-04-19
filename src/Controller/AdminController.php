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
            return $this->redirectToRoute('app_admin_dash');
        }

        $form = $this->createForm(UpdateUserFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $roles = [];

            foreach ($form->get('roles')->getData() as $role) {
                $roles[] = $role;
            }

            $user->setFirst_name($form->get('first_name')->getData());
            $user->setLast_name($form->get('last_name')->getData());
            $user->setEmail($form->get('email')->getData());

            $user->setRoles(array_unique($roles));
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_dash');
        }

        return $this->render('admin/updateUser.html.twig', [
            'form' => $form,
            'user' => $user
        ]);
    }

    #[Route('/admin/dashboard/delete_user/{id}', name: 'user_delete')]
    public function deleteUser(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, int $id): Response
    {
        $user = $entityManager->getRepository(Users::class)->find($id);

        if (!$user) {
            return $this->redirectToRoute('app_admin_dash');
        }

        $cuurent = $this->getUser();
        $username = $cuurent->getEmail();

        if ($username != $user->getEmail()) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_dash');
    }
}
