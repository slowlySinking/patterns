<?php

namespace App\Services\Pizza\PizzaIngredientFactory;

use App\Entity\Pizza\Pizza;

class NYPizzaIngredientFactory implements PizzaIngredientFactoryInterface
{
    /**
     * @return string
     */
    public function createDough()
    {
        return Pizza::DOUGH_THICK;
    }

    /**
     * @return string
     */
    public function createSauce()
    {
        return Pizza::SAUCE_MARINARA;
    }

    /**
     * @return string
     */
    public function createCheese()
    {
        return Pizza::CHEESE_MOZZARELLA;
    }

    /**
     * @return string
     */
    public function createClam()
    {
        return Pizza::CLAM_FRESH;
    }
}