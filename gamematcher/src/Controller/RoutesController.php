<?php

namespace App\Controller;

use App\Entity\Videogames;
use App\Form\VideogamesType;
use App\Repository\VideogamesRepository;
use App\Entity\Cpulist;
use App\Form\CpulistType;
use App\Repository\CpulistRepository;
// use App\Form\Gpulist;
// use App\Entity\GpulistType;
// use App\Repository\GpulistRepository;
// use App\Entity\Ramlist;
// use App\Form\RamlistType;
// use App\Repository\RamlistRepository;
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
    public function searchgames(VideogamesRepository $videogamesRepository, CpulistRepository $cpulistRepository, ): Response
    {
        return $this->render('routes/searchgames.html.twig', [
            'controller_name' => 'RoutesController',
            'videogames' => $videogamesRepository->findAll(),
            //'gpu' => $gpulistRepository->findAll(),
            'cpu' => $cpulistRepository->findAll(),
            //'ram' => $ramlistRepository->findAll()
        ]);
    }
//GpulistRepository $gpulistRepository, RamlistRepository $ramlistRepository

}
