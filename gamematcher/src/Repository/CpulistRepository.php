<?php

namespace App\Repository;

use App\Entity\Cpulist;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cpulist>
 *
 * @method Cpulist|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cpulist|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cpulist[]    findAll()
 * @method Cpulist[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CpulistRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cpulist::class);
    }

//    /**
//     * @return Cpulist[] Returns an array of Cpulist objects
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

//    public function findOneBySomeField($value): ?Cpulist
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
