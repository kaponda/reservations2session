<?php

namespace App\Repository;

use App\Entity\ArtistsTypes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ArtistsTypes>
 *
 * @method ArtistsTypes|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArtistsTypes|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArtistsTypes[]    findAll()
 * @method ArtistsTypes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArtistsTypesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArtistsTypes::class);
    }

    public function add(ArtistsTypes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ArtistsTypes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ArtistsTypes[] Returns an array of ArtistsTypes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ArtistsTypes
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
