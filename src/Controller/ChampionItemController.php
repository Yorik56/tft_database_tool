<?php

namespace App\Controller;

use App\Entity\ChampionItem;
use App\Form\ChampionItemType;
use App\Repository\ChampionItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/champion/item')]
class ChampionItemController extends AbstractController
{
    #[Route('/', name: 'app_champion_item_index', methods: ['GET'])]
    public function index(ChampionItemRepository $championItemRepository): Response
    {
        return $this->render('champion_item/index.html.twig', [
            'champion_items' => $championItemRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_champion_item_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ChampionItemRepository $championItemRepository): Response
    {
        $championItem = new ChampionItem();
        $form = $this->createForm(ChampionItemType::class, $championItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $championItemRepository->add($championItem, true);

            return $this->redirectToRoute('app_champion_item_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('champion_item/new.html.twig', [
            'champion_item' => $championItem,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_champion_item_show', methods: ['GET'])]
    public function show(ChampionItem $championItem): Response
    {
        return $this->render('champion_item/show.html.twig', [
            'champion_item' => $championItem,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_champion_item_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ChampionItem $championItem, ChampionItemRepository $championItemRepository): Response
    {
        $form = $this->createForm(ChampionItemType::class, $championItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $championItemRepository->add($championItem, true);

            return $this->redirectToRoute('app_champion_item_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('champion_item/edit.html.twig', [
            'champion_item' => $championItem,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_champion_item_delete', methods: ['POST'])]
    public function delete(Request $request, ChampionItem $championItem, ChampionItemRepository $championItemRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$championItem->getId(), $request->request->get('_token'))) {
            $championItemRepository->remove($championItem, true);
        }

        return $this->redirectToRoute('app_champion_item_index', [], Response::HTTP_SEE_OTHER);
    }
}
