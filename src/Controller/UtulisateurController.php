<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UtulisateurController extends AbstractController
{
    
    #[Route('/', name: 'app_main')]
    public function index(Request $request): Response
    {
        return $this->render('main.html.twig',[
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UtulisateurController.php',
        ]);
    }


    #[Route('/utulisateur', name: 'app_utulisateur')]
    public function utulisateur(Request $request): Response
    {
        return $this->render('utulisateur.html.twig',[
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UtulisateurController.php',
        ]);
    }
}