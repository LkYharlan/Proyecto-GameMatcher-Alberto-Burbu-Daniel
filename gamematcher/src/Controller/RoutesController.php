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
use App\Entity\Genre;
use App\Form\GenreType;
use App\Repository\GenreRepository;
use Symfony\Component\HttpFoundation\Request;
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
    public function searchgames(Request $request, GenreRepository $genreRepository, VideogamesRepository $videogamesRepository, GpulistRepository $gpulistRepository,  CpulistRepository $cpulistRepository, RamlistRepository $ramlistRepository): Response
    {
        $displayedGames = [];

        if ($request->isMethod('POST')) {
            $selectedGpuScore = $gpulistRepository->findBy((['model' => $request->get('gpu')]))[0]->getGpuscore();
            $selectedCpuScore = $cpulistRepository->findBy((['model' => $request->get('cpu')]))[0]->getCpuscore();
            $selectedRamScore = $ramlistRepository->findBy((['memory' => $request->get('ram')]))[0]->getRamscore();


            $genres = $genreRepository->findAll();
            $videogames = $videogamesRepository->findAll();

            foreach ($videogames as $videogame) {
                if ($videogame->getCpurequirement()->getCpuscore() <= $selectedCpuScore && $videogame->getGpurequirement()->getGpuscore() <= $selectedGpuScore && $videogame->getRamrequirement()->getRamscore() <= $selectedRamScore) {

                    $displayedGames[] = $videogame;
                }
            }
            $finalGames = [];

            if (!is_null($request->get('genre'))) {
                foreach ($displayedGames as $videogame) {
                    foreach ($videogame->getGenreId()->toArray() as $genre) {
                        if (in_array(strtolower($genre->getCategory()), $request->get('genre'))) {
                            $finalGames[] = $videogame;
                        }
                    }
                }
            }
            $displayedGames = !empty($finalGames) ? $finalGames : $displayedGames;

        } else {
            $userSpecs = $this->getUser()->getMyspecs();
            $userCpu = $userSpecs->getCpuId()->getCpuscore();
            $userGpu = $userSpecs->getGpuId()->getGpuscore();
            $userRam = $userSpecs->getRamId()->getRamscore();
            $videogames = $videogamesRepository->findAll();

            foreach ($videogames as $videogame) {
                if ($videogame->getCpurequirement()->getCpuscore() <= $userCpu && $videogame->getGpurequirement()->getGpuscore() <= $userGpu && $videogame->getRamrequirement()->getRamscore() <= $userRam) {
                    $displayedGames[] = $videogame;
                }
            }
        }
        return $this->render('routes/searchgames.html.twig', [
            'controller_name' => 'RoutesController',
            'videogames' => $displayedGames,
            'cpu' => $cpulistRepository->findAll(),
            'gpu' => $gpulistRepository->findAll(),
            'ram' => $ramlistRepository->findAll(),
        ]);
    }


    #[Route('/about', name: 'about')]
    public function about(VideogamesRepository $videogamesRepository, GpulistRepository $gpulistRepository,  CpulistRepository $cpulistRepository, RamlistRepository $ramlistRepository): Response
    {
        return $this->render('routes/about.html.twig', []);
    }

    #[Route('/contact', name: 'contact')]
    public function contact(VideogamesRepository $videogamesRepository, GpulistRepository $gpulistRepository,  CpulistRepository $cpulistRepository, RamlistRepository $ramlistRepository): Response
    {
        return $this->render('routes/contact.html.twig', []);
    }

    #[Route('/faq', name: 'faq')]
    public function faq(VideogamesRepository $videogamesRepository, GpulistRepository $gpulistRepository,  CpulistRepository $cpulistRepository, RamlistRepository $ramlistRepository): Response
    {
        return $this->render('routes/faq.html.twig', []);
    }
}
