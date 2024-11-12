<?php

namespace App\Repository;

use App\Entity\Gpulist;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Gpulist>
 *
 * @method Gpulist|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gpulist|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gpulist[]    findAll()
 * @method Gpulist[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GpulistRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gpulist::class);
    }

//    /**
//     * @return Gpulist[] Returns an array of Gpulist objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Gpulist
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
