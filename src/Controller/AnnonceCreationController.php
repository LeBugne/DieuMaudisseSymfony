<?php

namespace App\Controller;

use App\Entity\Prestations;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnonceCreationController extends AbstractController
{
    #[Route('/annonce/creation', name: 'app_annonce_creation')]
    public function index(): Response
    {
        $form = $this->createForm(Prestations::class);
        return $this->render('annonce_creation/creation.html.twig', [
            'form' => $form->createView()
        ]);
        # return $this->render('annonce_creation/index.html.twig', [
        #     'controller_name' => 'AnnonceCreationController',
        # ]);
    }
}
