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
}
