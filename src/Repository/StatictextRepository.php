<?php

namespace App\Repository;

use App\Entity\Statictext;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Statictext|null find($id, $lockMode = null, $lockVersion = null)
 * @method Statictext|null findOneBy(array $criteria, array $orderBy = null)
 * @method Statictext[]    findAll()
 * @method Statictext[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatictextRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Statictext::class);
    }

    // /**
    //  * @return Statictext[] Returns an array of Statictext objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Statictext
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
