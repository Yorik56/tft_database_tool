<?php

namespace App\Repository;

use App\Entity\ChampionItemPosition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ChampionItemPosition>
 *
 * @method ChampionItemPosition|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChampionItemPosition|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChampionItemPosition[]    findAll()
 * @method ChampionItemPosition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChampionItemPositionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChampionItemPosition::class);
    }

    public function add(ChampionItemPosition $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ChampionItemPosition $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ChampionItemPosition[] Returns an array of ChampionItemPosition objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ChampionItemPosition
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
