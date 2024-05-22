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

        // pour afficher toutes les entreprises
        //$entreprises = $entrepriseRepository->findAll();

        // pour trier les entreprises sur la raison sociale dans l'ordre croissant
        // SELECT * FROM entreprise WHERE ville = "STRASBOURG" ORDER BY raisonSociale ( ASC et non DESC) 
        // $entreprises = $entrepriseRepository->findBy(["ville" =>"STRASBOURG"], ["raisonSociale" => "ASC"]);

        // pour afficher toutes les entreprises et détailler la liste
        $entreprises = $entrepriseRepository->findBy([], ["raisonSociale" => "ASC"]);


        return $this->render('entreprise/index.html.twig', [
            // 'controller_name' => 'EntrepriseController',
            // 'name' => 'Elan Formation'
            // 'name' => $name, // on ajoute cette ligne
            //  'tableau' => $tableau// on ajoute cette ligne avec var et ',' dans la ligne précédente
            'entreprises'  => $entreprises
        ]);
    }

    // pour détailler la liste des entreprises --> entreprise (sing.)
    #[Route('/entreprise/{id}', name: 'show_entreprise')]
    public function show(Entreprise $entreprise): Response
    {
        return $this->render('entreprise/show.html.twig', [
            'entreprise'  => $entreprise
        ]);

    }
}
