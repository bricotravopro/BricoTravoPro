<?php

namespace App\Repository;

use App\Entity\Particulier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EmailNewsletter|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmailNewsletter|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmailNewsletter[]    findAll()
 * @method EmailNewsletter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewsletterRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EmailNewsletter::class);
    }

}
