<?php

namespace App\Repository;

use App\Entity\StackOverflowQuestion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StackOverflowQuestion>
 */
class StackOverflowQuestionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StackOverflowQuestion::class);
    }

    /**
     * @param string $queryKey
     * @return StackOverflowQuestion[]
     */
    public function findAllByQuery(string $queryKey, ?\DateTime $fromDate = null, ?\DateTime $toDate = null): array
    {
        $qb = $this->createQueryBuilder('q')
            ->where('q.query = :queryKey')
            ->setParameter('queryKey', $queryKey);

        if ($fromDate) {
            $qb->andWhere('q.creation_date >= :fromDate')
            ->setParameter('fromDate', $fromDate);
        }

        if ($toDate) {
            $qb->andWhere('q.creation_date <= :toDate')
            ->setParameter('toDate', $toDate);
        }

        return $qb->getQuery()->getResult();
    }

    public function findOneByQueryKey(string $queryKey)
    {
        return $this->createQueryBuilder('q')
            ->where('q.queryKey = :queryKey')
            ->setParameter('queryKey', $queryKey)
            ->getQuery();
    }
    //    /**
    //     * @return StackOverflowQuestion[] Returns an array of StackOverflowQuestion objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?StackOverflowQuestion
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
