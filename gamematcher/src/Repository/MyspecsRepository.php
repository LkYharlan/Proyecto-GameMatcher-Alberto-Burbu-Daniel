<?php

namespace App\Repository;

use App\Entity\Myspecs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Myspecs>
 *
 * @method Myspecs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Myspecs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Myspecs[]    findAll()
 * @method Myspecs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MyspecsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Myspecs::class);
    }

//    /**
//     * @return Myspecs[] Returns an array of Myspecs objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Myspecs
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
