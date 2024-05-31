<?php

namespace App\Controller;

use App\Entity\Service;
use App\Form\ServiceType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController
{
    #[Route('/service', name: 'app_service')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Créer une nouvelle entité Service
        $service = new Service();

        // Créer le formulaire
        $form = $this->createForm(ServiceType::class, $service);

        // Gérer la soumission du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Enregistrer les données dans la base de données
            $entityManager->persist($service);
            $entityManager->flush();

            // Rediriger vers une autre page ou afficher un message de succès
            return $this->redirectToRoute('app_service_success');
        }

        return $this->render('Service.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/service/success', name: 'app_service_success')]
    public function success(): Response
    {
        return $this->render('ServiceSuccess.html.twig');
    }
}
