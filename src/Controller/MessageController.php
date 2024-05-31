<?php

namespace App\Controller;

use App\Entity\Message;
use App\Entity\Utulisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    #[Route('/message', name: 'app_message')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        // Récupérer tous les utilisateurs
        $utilisateurs = $entityManager->getRepository(Utulisateur::class)->findAll();

        // Filtrer les administrateurs (par exemple, en utilisant le rôle)
        $administrateurs = array_filter($utilisateurs, function ($utilisateur) {
            return $utilisateur->getRole() === 'ROLE_ADMIN';
        });

        return $this->render('Message.html.twig', [
            'utilisateurs' => $utilisateurs,
            'administrateurs' => $administrateurs,
        ]);
    }

    #[Route('/message/save', name: 'app_message_save', methods: ['POST'])]
    public function save(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Récupérer les données du formulaire
        $userId = $request->request->get('user');
        $adminId = $request->request->get('admin');
        $messageContent = $request->request->get('message');

        // Récupérer les utilisateurs depuis la base de données
        $user = $entityManager->getRepository(Utulisateur::class)->find($userId);
        $admin = $entityManager->getRepository(Utulisateur::class)->find($adminId);

        // Vérifier si les utilisateurs existent
        if ($user && $admin) {
            // Créer et enregistrer le message
            $message = new Message();
            $message->setContent($messageContent);
            $message->setSender($user);
            $message->setReciever($admin);
            $message->setSentAt(new \DateTime());

            $entityManager->persist($message);
            $entityManager->flush();

            // Rediriger vers une nouvelle page avec un message de succès
            return $this->redirectToRoute('app_message_success');
        }

        // En cas d'erreur, rediriger vers une page d'erreur ou afficher un message
        return $this->redirectToRoute('app_error_page');
    }

    #[Route('/message/success', name: 'app_message_success')]
    public function success(): Response
    {
        return $this->render('MessageSuccess.html.twig');
    }
}
