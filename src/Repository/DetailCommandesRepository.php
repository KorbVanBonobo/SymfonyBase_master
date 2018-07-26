<?php

namespace App\Repository;

use App\Entity\DetailCommandes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DetailCommandes|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetailCommandes|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetailCommandes[]    findAll()
 * @method DetailCommandes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetailCommandesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DetailCommandes::class);
    }

    public function findOneByOeuvreAndDetailCommande(Oeuvres $oeuvre, $detailCommandes){

        if (!is_object($detailCommandes)) {
            return null;
        }

        return $this->createQueryBuilder('a')
            ->andWhere('a.detailCommandes = :detailCommandes')
            ->andWhere('a.oeuvre = :oeuvre')
            ->setParameter('detailCommandes', $detailCommandes)
            ->setParameter('oeuvre', $oeuvre)
            ->getQuery()
            ->getOneOrNullResult();   
    }

//    /**
//     * @return DetailCommandes[] Returns an array of DetailCommandes objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DetailCommandes
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
