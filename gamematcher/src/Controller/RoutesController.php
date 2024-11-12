<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RoutesController extends AbstractController
{
    #[Route('/', name: 'app_routes')]
    public function index(): Response
    {
        return $this->render('routes/index.html.twig', [
            'controller_name' => 'RoutesController',
        ]);
    }
}
