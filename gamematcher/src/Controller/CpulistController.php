<?php

namespace App\Controller;

use App\Entity\Cpulist;
use App\Form\CpulistType;
use App\Repository\CpulistRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cpulist')]
class CpulistController extends AbstractController
{
    #[Route('/', name: 'app_cpulist_index', methods: ['GET'])]
    public function index(CpulistRepository $cpulistRepository): Response
    {
        return $this->render('cpulist/index.html.twig', [
            'cpulists' => $cpulistRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_cpulist_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cpulist = new Cpulist();
        $form = $this->createForm(CpulistType::class, $cpulist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cpulist);
            $entityManager->flush();

            return $this->redirectToRoute('app_cpulist_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cpulist/new.html.twig', [
            'cpulist' => $cpulist,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cpulist_show', methods: ['GET'])]
    public function show(Cpulist $cpulist): Response
    {
        return $this->render('cpulist/show.html.twig', [
            'cpulist' => $cpulist,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_cpulist_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cpulist $cpulist, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CpulistType::class, $cpulist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_cpulist_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cpulist/edit.html.twig', [
            'cpulist' => $cpulist,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cpulist_delete', methods: ['POST'])]
    public function delete(Request $request, Cpulist $cpulist, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cpulist->getId(), $request->request->get('_token'))) {
            $entityManager->remove($cpulist);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_cpulist_index', [], Response::HTTP_SEE_OTHER);
    }
}
