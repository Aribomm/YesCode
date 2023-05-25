<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{

    
    #[Route('/user', name: 'user_index')]
    public function show(User $user): Response
    {
        return $this->render('user/index.html.twig', [
            'user' => $user,
        ]);
    }
    
/* 
    #[Route('/users/new', name: 'user_create')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash("success", "L'utilisateur <strong>{$user->getFirstName()} {$user->getLastName()}</strong> a bien été créé");

            return $this->redirectToRoute('user_show', ['slug' => $user->getSlug()]);
        }

        return $this->render('user/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
 */
 /*    #[Route('/user/{slug}/edit', name: 'user_edit')]
    public function edit(Request $request, EntityManagerInterface $entityManager, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Utilisateur modifié avec succès!');

            return $this->redirectToRoute('user_show', ['slug' => $user->getSlug()]);
        }

        return $this->render('user/edit.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }

    #[Route('/user/{slug}/delete', name: 'user_delete')]
    public function delete(Request $request, EntityManagerInterface $entityManager, User $user): Response
    {
        if ($request->isMethod('POST')) {
            $entityManager->remove($user);
            $entityManager->flush();

            $this->addFlash('success', "L'utilisateur a été supprimé avec succès!");

            return $this->redirectToRoute('users_index');
        }

        return $this->render('user/delete.html.twig', [
            'user' => $user,
        ]);
    }
 */
}
