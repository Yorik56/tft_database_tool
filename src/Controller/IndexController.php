<?php

namespace App\Controller;

use App\Entity\Champion;
use App\Entity\Item;
use App\Service\Utils;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    private Utils $utils;
    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager,Utils $utils)
    {
        $this->utils = $utils;
        $this->entityManager = $entityManager;
    }

    #[Route('/items', name: 'items')]
    public function items(): Response
    {
        $items = $this->entityManager->getRepository(Item::class)->findAll();

        return $this->render('index/items.html.twig', [
            'controller_name' => 'IndexController',
            'items' => $items
        ]);
    }

    #[Route('/champions', name: 'champions')]
    public function champions(): Response
    {
        $champions = $this->entityManager->getRepository(Champion::class)->findAll();

        return $this->render('index/champions.html.twig', [
            'controller_name' => 'IndexController',
            'champions' => $champions
        ]);
    }

    /**
     * Export all items from the database to a json file
     * @return Response
     */
    #[Route('/export_items', name: 'export_items')]
    public function exportItems()
    {
        $this->utils->exportJsonFromDbItems();
        return new Response('Items exported');
    }

    /**
     * Export all items from the database to a json file
     * @return Response
     */
    #[Route('/export_champions', name: 'export_champions')]
    public function export_champions()
    {
        $this->utils->exportJsonFromDbChampions();
        return new Response('Champions exported');
    }
}
