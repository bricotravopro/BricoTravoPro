<?php

namespace App\Repository;

use App\Entity\ContactParticulier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ContactParticulier|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactParticulier|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactParticulier[]    findAll()
 * @method ContactParticulier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactParticulierRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ContactParticulier::class);
    }

    // /**
    //  * @return ContactParticulier[] Returns an array of ContactParticulier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ContactParticulier
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
