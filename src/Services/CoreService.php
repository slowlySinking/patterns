<?php

namespace App\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class CoreService
{
    const ENTITY_NAME = '';

    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository
     */
    protected $repository;

    /**
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    /**
     * CoreService constructor.
     * @param EntityManager $entityManager
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(EntityManager $entityManager, EventDispatcherInterface $dispatcher)
    {
        $this->em = $entityManager;
        $this->repository = $this->em->getRepository(static::ENTITY_NAME);
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param $entity
     */
    public function save($entity)
    {
        $this->em->persist($entity);
        $this->em->flush();
    }

    /**
     * @param array $criteria
     * @param array|null $orderBy
     * @param null $limit
     * @param null $offset
     * @return array|object[]
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->repository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * @return array|object[]
     */
    public function findAll()
    {
        return $this->repository->findAll();
    }

    /**
     * @param array $args
     * @return null|object
     */
    public function findOneBy(array $args)
    {
        return $this->repository->findOneBy($args);
    }

    /**
     * @return mixed
     */
    public function findLastRecord()
    {
        return $this->repository->findLastRecord();
    }
}