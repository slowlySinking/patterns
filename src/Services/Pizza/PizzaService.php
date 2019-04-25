<?php

namespace App\Services\Pizza;

use App\Entity\Pizza\Pizza;
use App\Services\CoreService;
use App\Services\Pizza\PizzaStore\NYPizzaStore;
use App\Services\Pizza\PizzaStore\ChicagoPizzaStore;
use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class PizzaService extends CoreService
{
    const ENTITY_NAME = Pizza::class;

    /**
     * @var NYPizzaStore
     */
    protected $NYPizzaStore;

    /**
     * @var ChicagoPizzaStore
     */
    protected $ChicagoPizzaStore;

    public function __construct(
        EntityManager $entityManager,
        EventDispatcherInterface $dispatcher,
        ChicagoPizzaStore $chicagoPizzaStore,
        NYPizzaStore $NYPizzaStore
    )
    {
        $this->ChicagoPizzaStore = $chicagoPizzaStore;
        $this->NYPizzaStore = $NYPizzaStore;

        parent::__construct($entityManager, $dispatcher);
    }

    /**
     * @param Pizza $pizza
     * @param string $city
     */
    public function orderPizza(Pizza $pizza, string $city)
    {
        $pizzaStore = null;

        $pizzaStore = $city . 'PizzaStore';
        $createdPizza = $this->{$pizzaStore}->create($pizza);

        $pizza->setName($pizza->getName() . ' (' . $pizzaStore . ')');

        $this->save($createdPizza);
    }

    /**
     * @param $entity
     */
    public function save($entity)
    {
        $date = new \DateTime();
        $entity->setCreatedAt($date);
        $entity->setUpdatedAt($date);

        parent::save($entity);
    }
}