<?php

namespace App\Controller;

use App\Entity\Videogames;
use App\Form\VideogamesType;
use App\Repository\VideogamesRepository;
use App\Entity\Review;
use App\Form\ReviewType;
use App\Repository\ReviewRepository;
use App\Entity\Comments;
use App\Form\CommentsType;
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
use App\Repository\CommentsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/videogames')]
class VideogamesController extends AbstractController
{
    #[Route('/', name: 'app_videogames_index', methods: ['GET'])]
    public function index(VideogamesRepository $videogamesRepository): Response
    {
        return $this->render('videogames/index.html.twig', [
            'videogames' => $videogamesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_videogames_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $videogame = new Videogames();
        $form = $this->createForm(VideogamesType::class, $videogame);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($videogame);
            $entityManager->flush();

            return $this->redirectToRoute('app_videogames_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('videogames/new.html.twig', [
            'videogame' => $videogame,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_videogames_show', methods: ['GET'])]
    public function show(Videogames $videogame, CommentsRepository $commentsRepository, GenreRepository $genreRepository, Reviewrepository $reviewRepository, GpulistRepository $gpulistRepository,  CpulistRepository $cpulistRepository, RamlistRepository $ramlistRepository): Response
    {
        return $this->render('videogames/show.html.twig', [
            'videogame' => $videogame,
            'comments' => $commentsRepository->findAll(),
            'reviews' => $reviewRepository->findAll(),
            'cpu' => $cpulistRepository->findAll(),
            'gpu' => $gpulistRepository->findAll(),
            'ram' => $ramlistRepository->findAll(),
            'genre' => $genreRepository->findAll(),
        ]);
    }

    #[Route('/{id}/edit', name: 'app_videogames_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Videogames $videogame, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(VideogamesType::class, $videogame);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_videogames_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('videogames/edit.html.twig', [
            'videogame' => $videogame,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_videogames_delete', methods: ['POST'])]
    public function delete(Request $request, Videogames $videogame, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$videogame->getId(), $request->request->get('_token'))) {
            $entityManager->remove($videogame);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_videogames_index', [], Response::HTTP_SEE_OTHER);
    }
}
