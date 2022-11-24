<?php

namespace App\Repository;

use App\Entity\Vendre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Vendre>
 *
 * @method Vendre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vendre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vendre[]    findAll()
 * @method Vendre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VendreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vendre::class);
    }

    public function save(Vendre $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Vendre $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


   /**
    * @return Vendre[] Returns an array of Vendre objects
    */
   public function findByTicketId($annee, $no): array
   {
       return $this->createQueryBuilder('v')
           ->andWhere('v.annee = :annee')
           ->andWhere('v.numeroTicket = :no')
           ->setParameter('annee', $annee)
           ->setParameter('no', $no)
           ->orderBy('v.idArticle', 'ASC')
        //    ->setMaxResults(10)
           ->getQuery()
           ->getResult()
       ;

    //    $entityManager = $this->getEntityManager();
    //    $query = $entityManager->createQuery(
    //        "SELECT  v.annee, v.numeroTicket, v.idArticle, a.nomArticle ,  a.volume , v.prixVente, v.quantite
    //        FROM App\Entity\Vendre v INNER JOIN App\Entity\Article a
    //        WITH v.idArticle = a.idArticle
    //        WHERE (v.annee = $annee) AND (v.numeroTicket = $no)
    //        ORDER BY v.idArticle"

    //    );

    //    return $query->getResult();
   }
//    /**
//     * @return Vendre[] Returns an array of Vendre objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Vendre
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
