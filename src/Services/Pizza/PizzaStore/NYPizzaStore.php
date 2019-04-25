<?php

namespace App\Services\Pizza\PizzaStore;

use App\Services\Pizza\PizzaIngredientFactory\NYPizzaIngredientFactory;

class NYPizzaStore extends PizzaStore
{
    /**
     * @param NYPizzaIngredientFactory $pizzaIngredientFactory
     */
    public function __construct(NYPizzaIngredientFactory $pizzaIngredientFactory)
    {
        $this->pizzaIngredientFactory = $pizzaIngredientFactory;
    }
}