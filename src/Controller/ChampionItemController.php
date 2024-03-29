<?php

namespace App\Controller;

use App\Entity\ChampionItem;
use App\Entity\ChampionItemPosition;
use App\Form\ChampionItemType;
use App\Repository\ChampionItemRepository;
use App\Repository\ChampionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/champion/item')]
class ChampionItemController extends AbstractController
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/', name: 'app_champion_item_index', methods: ['GET'])]
    public function index(ChampionItemRepository $championItemRepository): Response
    {
        return $this->render('champion_item/index.html.twig', [
            'champion_items' => $championItemRepository->findAll(),
        ]);
    }

    #[Route('/indexChamp/{id}', name: 'app_champion_item_index_champ', methods: ['GET'])]
    public function indexChamp(Request $request,ChampionItemRepository $championItemRepository): Response
    {
        return $this->render('champion_item/index.html.twig', [
            'champion_items' => $championItemRepository->findBy([
                'champion' => $request->get('id')
            ]),
        ]);
    }

    #[Route('/newByChamp/{id}', name: 'app_champion_item_new_by_champ', methods: ['GET', 'POST'])]
    public function newByChamp(Request $request, ChampionItemRepository $championItemRepository, ChampionRepository $championRepository): Response
    {
        $championItem = new ChampionItem();
        $form = $this->createForm(ChampionItemType::class, $championItem);
        $form->get('champion')->setData($championRepository->find($request->get('id')));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if($this->checkExistence($championItemRepository, $championItem)) {
                $championItemRepository->add($championItem, true);
                // Création des positions pour chaque item
                foreach ($championItem->getItems() as $index => $item) {
                    $championItemPosition = new ChampionItemPosition();
                    $championItemPosition->setChampionItem($championItem);
                    $championItemPosition->setItem($item);
                    $championItemPosition->setPosition($index);
                    $this->em->persist($championItemPosition);
                }
                $this->em->flush();
                return $this->redirectToRoute('app_champion_item_index', [], Response::HTTP_SEE_OTHER);
            }
            else {
                $form->addError(new \Symfony\Component\Form\FormError('List item '. $championItem->getRank() .' already exists for ' . $championItem->getChampion()->getName()));
            }
        }

        return $this->renderForm('champion_item/new.html.twig', [
            'champion_item' => $championItem,
            'form' => $form,
        ]);
    }


    #[Route('/new', name: 'app_champion_item_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ChampionItemRepository $championItemRepository): Response
    {
        $championItem = new ChampionItem();
        $form = $this->createForm(ChampionItemType::class, $championItem);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if($this->checkExistence($championItemRepository, $championItem)) {
                $championItemRepository->add($championItem, true);
                // Création des positions pour chaque item
                foreach ($championItem->getItems() as $index => $item) {
                    $championItemPosition = new ChampionItemPosition();
                    $championItemPosition->setChampionItem($championItem);
                    $championItemPosition->setItem($item);
                    $championItemPosition->setPosition($index);
                    $this->em->persist($championItemPosition);
                }
                $this->em->flush();
                return $this->redirectToRoute('app_champion_item_index', [], Response::HTTP_SEE_OTHER);
            }
            else {
                $form->addError(new \Symfony\Component\Form\FormError('List item '. $championItem->getRank() .' already exists for ' . $championItem->getChampion()->getName()));
            }
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
            //Suppression des positions
            $championItemPositions = $this->em->getRepository(ChampionItemPosition::class)->findBy([
                'championItem' => $championItem
            ]);
            foreach ($championItemPositions as $championItemPosition) {
                $this->em->remove($championItemPosition);
                $this->em->flush();
            }
            $championItemRepository->add($championItem, true);
            // Création des positions pour chaque item
            foreach ($championItem->getItems() as $index => $item) {
                $championItemPosition = new ChampionItemPosition();
                $championItemPosition->setChampionItem($championItem);
                $championItemPosition->setItem($item);
                $championItemPosition->setPosition($index);
                $this->em->persist($championItemPosition);
            }
            $this->em->flush();
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
            //Suppression des positions
            $championItemPositions = $this->em->getRepository(ChampionItemPosition::class)->findBy([
                'championItem' => $championItem
            ]);
            foreach ($championItemPositions as $championItemPosition) {
                $this->em->remove($championItemPosition);
                $this->em->flush();
            }

            $championItemRepository->remove($championItem, true);
        }

        return $this->redirectToRoute('app_champion_item_index', [], Response::HTTP_SEE_OTHER);
    }

    public function checkExistence(ChampionItemRepository $championItemRepository, ChampionItem $championItem): bool
    {
        $itemSavedInDb = $championItemRepository->findBy([
            'champion' => $championItem->getChampion()
        ]);
        $newListItem = true;
        foreach ($itemSavedInDb as $item) {
            if ($item->getRank() == $championItem->getRank()) {
                $newListItem = false;
            }
        }
        return $newListItem;
    }
}
