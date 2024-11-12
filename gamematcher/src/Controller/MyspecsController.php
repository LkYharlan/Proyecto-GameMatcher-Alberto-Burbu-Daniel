<?php

namespace App\Controller;

use App\Entity\Myspecs;
use App\Form\MyspecsType;
use App\Repository\MyspecsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/myspecs')]
class MyspecsController extends AbstractController
{
    #[Route('/', name: 'app_myspecs_index', methods: ['GET'])]
    public function index(MyspecsRepository $myspecsRepository): Response
    {
        return $this->render('myspecs/index.html.twig', [
            'myspecs' => $myspecsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_myspecs_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $myspec = new Myspecs();
        $form = $this->createForm(MyspecsType::class, $myspec);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($myspec);
            $entityManager->flush();

            return $this->redirectToRoute('app_myspecs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('myspecs/new.html.twig', [
            'myspec' => $myspec,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_myspecs_show', methods: ['GET'])]
    public function show(Myspecs $myspec): Response
    {
        return $this->render('myspecs/show.html.twig', [
            'myspec' => $myspec,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_myspecs_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Myspecs $myspec, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MyspecsType::class, $myspec);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_myspecs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('myspecs/edit.html.twig', [
            'myspec' => $myspec,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_myspecs_delete', methods: ['POST'])]
    public function delete(Request $request, Myspecs $myspec, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$myspec->getId(), $request->request->get('_token'))) {
            $entityManager->remove($myspec);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_myspecs_index', [], Response::HTTP_SEE_OTHER);
    }
}
