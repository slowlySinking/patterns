<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class CoreRepository extends EntityRepository
{
    /**
     * @return mixed
     */
    public function findLastRecord()
    {
        $qb = $this->createQueryBuilder('e');
        $createdAt = $this->getLastCreatedAt();

        $qb
            ->select('e')
            ->where('e.createdAt = :createdAt')
            ->setParameter('createdAt', $createdAt);

        return $qb
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @return mixed
     */
    protected function getLastCreatedAt()
    {
        $qb = $this->createQueryBuilder('e');

        $qb
            ->select('MAX(e.createdAt)');

        return $qb
            ->getQuery()
            ->getSingleScalarResult();
    }
}