<?php

namespace App\Repository;

use App\Entity\Pro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Pro|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pro|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pro[]    findAll()
 * @method Pro[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Pro::class);
    }


    /**
     * @param $criteres
     * @return Pro[] Returns an array of Pro objects
     */

    public function rechercheArtisan($criteres)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.Ville = :Ville')
            ->setParameter('Ville', $criteres['Ville'])
            ->andWhere('c.SecteurActivite = :SecteurActivite')
            ->setParameter('SecteurActivite', $criteres['SecteurActivite'])
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(12)
            ->getQuery()
            ->getResult()
        ;
    }

    public function obtenirMeilleursArtisans($max, $secteur = NULL) {
        // SELECT *, AVG(a.note) as an FROM `pro` p INNER JOIN `avis` a ON p.id = a.id_pro_id GROUP BY p.id ORDER BY an
        // SELECT * FROM `pro` p INNER JOIN `avis` a ON p.id = a.id_pro_id GROUP BY p.id ORDER BY AVG(a.note)
        $builder = $this->createQueryBuilder('p');
        if ($secteur) {
            $builder = $builder->andWhere('p.SecteurActivite = :SecteurActivite')
                ->setParameter('SecteurActivite', $secteur);
        }
        return $builder->innerJoin('\\App\\Entity\\Avis', 'a', Join::WITH, 'a.Id_Pro = p')
            ->groupBy('p')
            ->orderBy('AVG(a.Note)', 'DESC')
            ->setMaxResults($max)
            ->getQuery()
            ->getResult();
    }


    /*
    public function findOneBySomeField($value): ?Pro
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
