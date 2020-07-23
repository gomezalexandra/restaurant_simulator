<?php

namespace App\Repository;

use App\Entity\Simulationbis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Simulationbis|null find($id, $lockMode = null, $lockVersion = null)
 * @method Simulationbis|null findOneBy(array $criteria, array $orderBy = null)
 * @method Simulationbis[]    findAll()
 * @method Simulationbis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SimulationbisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Simulationbis::class);
    }

    // /**
    //  * @return Simulationbis[] Returns an array of Simulationbis objects
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
    public function findOneBySomeField($value): ?Simulationbis
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
