<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Repository\EntrepriseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EntrepriseController extends AbstractController
{
    #[Route('/entreprise', name: 'app_entreprise')]
    // public function index(EntityManagerInterface $entityManager): Response
    public function index(EntrepriseRepository $entrepriseRepository): Response
    {
        // $name = 'Elan Formation'; // on ajoute cette ligne avec var
        // $tableau = ["valeur 1", "valeur 2", "valeur 3", "valeur 4"]; // on ajoute cette ligne avec var
        // $entreprises = $entityManager->getRepository(Entreprise::class)->findAll();
        $entreprises = $entrepriseRepository->findAll();
        return $this->render('entreprise/index.html.twig', [
            // 'controller_name' => 'EntrepriseController',
            // 'name' => 'Elan Formation'
            // 'name' => $name, // on ajoute cette ligne
            //  'tableau' => $tableau// on ajoute cette ligne avec var et ',' dans la ligne précédente
            'entreprises'  => $entreprises
        ]);
    }
}
