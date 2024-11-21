<?php

namespace App\Repository;

use App\Entity\Ramlist;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ramlist>
 *
 * @method Ramlist|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ramlist|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ramlist[]    findAll()
 * @method Ramlist[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RamlistRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ramlist::class);
    }

//    /**
//     * @return Ramlist[] Returns an array of Ramlist objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Ramlist
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
