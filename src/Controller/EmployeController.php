<?php

namespace App\Controller;

use App\Repository\EmployeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmployeController extends AbstractController
{
    #[Route('/employe', name: 'app_employe')]
    public function index(EmployeRepository $employeRepository): Response
    {
        // On affiche la liste des employés
        // $employes = $employeRepository->findAll();

        // On trie les employés sur le nom de famille dans l'ordre croissant
        //SELECT * FROM employe ORDER BY nom ASC
        $employes = $employeRepository->findBy([], ['nom' => 'ASC']);
        return $this->render('employe/index.html.twig', [
            'employes'  => $employes
        ]);
    }
}
