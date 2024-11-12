<?php

namespace App\Controller;

use App\Entity\Gpulist;
use App\Form\GpulistType;
use App\Repository\GpulistRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/gpulist')]
class GpulistController extends AbstractController
{
    #[Route('/', name: 'app_gpulist_index', methods: ['GET'])]
    public function index(GpulistRepository $gpulistRepository): Response
    {
        return $this->render('gpulist/index.html.twig', [
            'gpulists' => $gpulistRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_gpulist_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $gpulist = new Gpulist();
        $form = $this->createForm(GpulistType::class, $gpulist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($gpulist);
            $entityManager->flush();

            return $this->redirectToRoute('app_gpulist_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('gpulist/new.html.twig', [
            'gpulist' => $gpulist,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_gpulist_show', methods: ['GET'])]
    public function show(Gpulist $gpulist): Response
    {
        return $this->render('gpulist/show.html.twig', [
            'gpulist' => $gpulist,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_gpulist_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Gpulist $gpulist, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(GpulistType::class, $gpulist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_gpulist_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('gpulist/edit.html.twig', [
            'gpulist' => $gpulist,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_gpulist_delete', methods: ['POST'])]
    public function delete(Request $request, Gpulist $gpulist, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gpulist->getId(), $request->request->get('_token'))) {
            $entityManager->remove($gpulist);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_gpulist_index', [], Response::HTTP_SEE_OTHER);
    }
}
