<?php

namespace App\Controller;

use App\Entity\Videogames;
use App\Form\VideogamesType;
use App\Repository\VideogamesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RoutesController extends AbstractController
{
    #[Route('/', name: 'landing')]
    public function index(): Response
    {
        return $this->render('routes/index.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }

    #[Route('/searchgames', name: 'searchgames')]
    public function searchgames(VideogamesRepository $videogamesRepository): Response
    {
        return $this->render('routes/searchgames.html.twig', [
            'controller_name' => 'RoutesController',
            'videogames' => $videogamesRepository->findAll(),
        ]);
    }


}
