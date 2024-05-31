<?php

// src/Controller/SigninController.php
namespace App\Controller;

use App\Entity\Utulisateur;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class SigninController extends AbstractController
{
    #[Route('/signin', name: 'app_signin')]
    public function index(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new Utulisateur();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Encode the plain password
            $user->setPassword(
                $passwordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();

            // Add flash message
            $this->addFlash('success', 'Utilisateur ajouté avec succès!');

            return $this->redirectToRoute('app_signin');
        }

        return $this->render('signin.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
