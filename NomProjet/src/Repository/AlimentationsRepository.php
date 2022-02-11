<?php

namespace App\Repository;

use App\Entity\Alimentations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Alimentations|null find($id, $lockMode = null, $lockVersion = null)
 * @method Alimentations|null findOneBy(array $criteria, array $orderBy = null)
 * @method Alimentations[]    findAll()
 * @method Alimentations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlimentationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Alimentations::class);
    }

    // /**
    //  * @return Alimentations[] Returns an array of Alimentations objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Alimentations
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
