<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DiscussionController extends AbstractController
{
    #[Route('/discussion', name: 'app_discussion')]
    public function index(Request $request): Response
    {
        return $this->render('discussion.html.twig',[
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/DescriptionController.php',
        ]);
    }
}
