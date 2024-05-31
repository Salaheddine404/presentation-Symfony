<?php
// src/Controller/DescriptionController.php

namespace App\Controller;

use App\Entity\Service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class DescriptionController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/description', name: 'app_description')]
    public function index(Request $request): Response
    {
        $services = $this->entityManager->getRepository(Service::class)->findAll();

        return $this->render('description.html.twig', [
            'services' => $services,
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ServiceController.php',
        ]);
    }

    #[Route('/submit-description-form', name: 'app_submit_description_form')]
    public function submitDescriptionForm(Request $request): Response
    {
        // Traitez ici le formulaire de description et enregistrez les données

        // Rediriger vers une page de succès ou afficher un message de succès
        return $this->redirectToRoute('app_description_success');
    }

    #[Route('/description-success', name: 'app_description_success')]
    public function descriptionSuccess(): Response
    {
        return $this->render('description_success.html.twig');
    }
}

