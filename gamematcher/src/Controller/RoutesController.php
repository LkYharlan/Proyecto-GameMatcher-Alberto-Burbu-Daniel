<?php

namespace App\Controller;

use App\Entity\Videogames;
use App\Form\VideogamesType;
use App\Repository\VideogamesRepository;
use App\Entity\Cpulist;
use App\Form\CpulistType;
use App\Repository\CpulistRepository;
use App\Form\Gpulist;
use App\Entity\GpulistType;
use App\Repository\GpulistRepository;
use App\Entity\Ramlist;
use App\Form\RamlistType;
use App\Repository\RamlistRepository;
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
    public function searchgames(VideogamesRepository $videogamesRepository, GpulistRepository $gpulistRepository,  CpulistRepository $cpulistRepository, RamlistRepository $ramlistRepository): Response
    {
        return $this->render('routes/searchgames.html.twig', [
            'controller_name' => 'RoutesController',
            'videogames' => $videogamesRepository->findAll(),
            'cpu' => $cpulistRepository->findAll(),
            'gpu' => $gpulistRepository->findAll(),
            'ram' => $ramlistRepository->findAll()
        ]);
    }

    #[Route('/about', name: 'about')]
    public function about(VideogamesRepository $videogamesRepository, GpulistRepository $gpulistRepository,  CpulistRepository $cpulistRepository, RamlistRepository $ramlistRepository): Response
    {
        return $this->render('routes/about.html.twig', [
        ]);
    }

    #[Route('/contact', name: 'contact')]
    public function contact(VideogamesRepository $videogamesRepository, GpulistRepository $gpulistRepository,  CpulistRepository $cpulistRepository, RamlistRepository $ramlistRepository): Response
    {
        return $this->render('routes/contact.html.twig', [
            
        ]);
    }

    #[Route('/faq', name: 'faq')]
    public function faq(VideogamesRepository $videogamesRepository, GpulistRepository $gpulistRepository,  CpulistRepository $cpulistRepository, RamlistRepository $ramlistRepository): Response
    {
        return $this->render('routes/faq.html.twig', [
        ]);
    }


}
