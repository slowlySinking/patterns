<?php

namespace App\Services\Pizza\PizzaStore;

use App\Entity\Pizza\Pizza;
use App\Services\Pizza\PizzaIngredientFactory\PizzaIngredientFactoryInterface;

class PizzaStore
{
    const CITIES = [
        'NY', 'Chicago'
    ];

    /**
     * @var Pizza
     */
    protected $pizza;

    /**
     * @var PizzaIngredientFactoryInterface
     */
    protected $pizzaIngredientFactory;

    /**
     * @param Pizza $pizza
     * @return Pizza
     */
    public function create(Pizza $pizza)
    {
        $pizza->setDough($this->pizzaIngredientFactory->createDough());
        $pizza->setSauce($this->pizzaIngredientFactory->createSauce());
        $pizza->setCheese($this->pizzaIngredientFactory->createCheese());
        $pizza->setClam($this->pizzaIngredientFactory->createClam());

        return $pizza;
    }
}