<?php

namespace App\Repository;

use App\Entity\Oisaeu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Oisaeu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Oisaeu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Oisaeu[]    findAll()
 * @method Oisaeu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OisaeuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Oisaeu::class);
    }

    // /**
    //  * @return Oisaeu[] Returns an array of Oisaeu objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Oisaeu
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
