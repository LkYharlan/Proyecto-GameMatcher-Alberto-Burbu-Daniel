<?php

namespace App\Controller;

use App\Entity\Ramlist;
use App\Form\RamlistType;
use App\Repository\RamlistRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/ramlist')]
class RamlistController extends AbstractController
{
    #[Route('/', name: 'app_ramlist_index', methods: ['GET'])]
    public function index(RamlistRepository $ramlistRepository): Response
    {
        return $this->render('ramlist/index.html.twig', [
            'ramlists' => $ramlistRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ramlist_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ramlist = new Ramlist();
        $form = $this->createForm(RamlistType::class, $ramlist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ramlist);
            $entityManager->flush();

            return $this->redirectToRoute('app_ramlist_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ramlist/new.html.twig', [
            'ramlist' => $ramlist,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ramlist_show', methods: ['GET'])]
    public function show(Ramlist $ramlist): Response
    {
        return $this->render('ramlist/show.html.twig', [
            'ramlist' => $ramlist,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ramlist_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Ramlist $ramlist, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RamlistType::class, $ramlist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ramlist_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ramlist/edit.html.twig', [
            'ramlist' => $ramlist,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ramlist_delete', methods: ['POST'])]
    public function delete(Request $request, Ramlist $ramlist, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ramlist->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ramlist);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ramlist_index', [], Response::HTTP_SEE_OTHER);
    }
}
