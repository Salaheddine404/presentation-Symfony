<?php

namespace App\Controller;

use App\Entity\RndVs;
use App\Form\RndVsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RndVsController extends AbstractController
{
    #[Route('/rndvs', name: 'app_rndvs')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $rndVs = new RndVs();
        $form = $this->createForm(RndVsType::class, $rndVs);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($rndVs);
            $entityManager->flush();

            return $this->redirectToRoute('rndvs_success');
        }

        return $this->render('RndVs.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/rndvs/success', name: 'rndvs_success')]
    public function success(): Response
    {
        return $this->render('rndvs_success.html.twig');
    }
}
