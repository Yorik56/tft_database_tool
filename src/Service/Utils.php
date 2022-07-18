<?php

namespace App\Service;

use App\Entity\Champion;
use App\Entity\ContactRequest;
use App\Entity\Item;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Symfony\Component\HttpKernel\KernelInterface;

class Utils
{

    /** KernelInterface $appKernel */
    private KernelInterface $appKernel;
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager, KernelInterface $appKernel)
    {
        $this->appKernel     = $appKernel;
        $this->entityManager = $entityManager;
    }

    /**
     * Persist data from a json file to the database
     *
     * @return void
     */
    function sendJsonToDb(){
        $projectDir = $this->appKernel->getProjectDir();
        $file = file_get_contents($projectDir . '/public/Champion.json');
        $data = json_decode($file);

        foreach ($data as $key => $value) {
//            $imageArray = get_object_vars($value->image);
//            $imageName = reset($imageArray);
            $item = new Item();
            $item->setName($value->name);
            $item->setImage($value->image);
            $this->entityManager->persist($item);
        }
        $this->entityManager->flush();
    }

    function exportJsonFromDbItems(){
        $items = $this->entityManager->getRepository(Item::class)->findAll();
        $data = [];
        foreach ($items as $key => $value) {
            $data[] = [
                'id' => $value->getId(),
                'name' => $value->getName(),
                'image' => "require('../../assets/images/Item/" . $value->getImage() . ".png')",
            ];
        }

        $projectDir = $this->appKernel->getProjectDir();
        $file = $projectDir . '/public/export_item.json';
        $jsonData = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        file_put_contents($file, $jsonData);
    }

    function exportJsonFromDbChampions(){
        $champions = $this->entityManager->getRepository(Champion::class)->findAll();
        $data = [];
        foreach ($champions as $key => $value) {
            // Création du champion
            $data[] = [
                'name' => $value->getName(),
                'origine' => $value->getOrigine(),
                'id' => $value->getId(),
                'cost' => $value->getCost(),
                'image' => "require('../../assets/images/Champion/" . $value->getImage() . "')",
                'itemsA' => [],
                'itemsB' => [],
                'itemsC' => []
            ];
            // Ajout des items du champion
            foreach ($value->getChampionItems() as $key => $item) {
                if($item->getRank() == 'A'){
                    $data[count($data) - 1]['itemsA'][] = $item->getItem()->getId();
                }elseif($item->getRank() == 'B'){
                    $data[count($data) - 1]['itemsB'][] = $item->getItem()->getId();
                }elseif($item->getRank() == 'C'){
                    $data[count($data) - 1]['itemsC'][] = $item->getItem()->getId();
                }
            }
        }

        $projectDir = $this->appKernel->getProjectDir();
        $file = $projectDir . '/public/export_champion.json';
        $jsonData = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        file_put_contents($file, $jsonData);
    }
}
