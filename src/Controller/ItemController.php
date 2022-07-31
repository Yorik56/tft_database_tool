<?php

namespace App\Controller;

use App\Entity\Item;
use App\Form\ItemType;
use App\Repository\ItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/itemCrud')]
class ItemController extends AbstractController
{
    #[Route('/', name: 'app_item_index', methods: ['GET'])]
    public function index(ItemRepository $itemRepository): Response
    {
        return $this->render('item/index.html.twig', [
            'items' => $itemRepository->findAll(),
        ]);
    }

    #[Route('/emptyBuild', name: 'app_item_index_empty_build', methods: ['GET'])]
    public function emptyBuild(ItemRepository $itemRepository): Response
    {
        $itemArray = $itemRepository->findAll();
        foreach ($itemArray as $key => $item) {
            if ($item->getBuild()->count() > 0) {
                unset($itemArray[$key]);
                $itemArray = array_values($itemArray);
            }
        }
        return $this->render('item/index_empty_build.html.twig', [
            'items' => $itemArray,
        ]);
    }

    #[Route('/{id}', name: 'app_item_show', methods: ['GET'])]
    public function show(Item $item): Response
    {
        return $this->render('item/show.html.twig', [
            'item' => $item,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_item_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Item $item, ItemRepository $itemRepository): Response
    {
        $form = $this->createForm(ItemType::class, $item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $itemRepository->add($item, true);

            return $this->redirectToRoute('app_item_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('item/edit.html.twig', [
            'item' => $item,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_item_delete', methods: ['POST'])]
    public function delete(Request $request, Item $item, ItemRepository $itemRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$item->getId(), $request->request->get('_token'))) {
            $itemRepository->remove($item, true);
        }

        return $this->redirectToRoute('app_item_index', [], Response::HTTP_SEE_OTHER);
    }

}
