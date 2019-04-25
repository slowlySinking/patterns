<?php

namespace App\Services\Pizza\PizzaStore;

use App\Services\Pizza\PizzaIngredientFactory\ChicagoPizzaIngredientFactory;

class ChicagoPizzaStore extends PizzaStore
{
    /**
     * @param ChicagoPizzaIngredientFactory $pizzaIngredientFactory
     */
    public function __construct(ChicagoPizzaIngredientFactory $pizzaIngredientFactory)
    {
        $this->pizzaIngredientFactory = $pizzaIngredientFactory;
    }
}