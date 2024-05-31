<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DesacualController extends AbstractController
{
    #[Route('/desacual', name: 'app_desacual')]
    public function index(Request $request): Response
    {
        return $this->render('desacuel.html.twig', [
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ServiceController.php',
        ]);
    }
   
}
