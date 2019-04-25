<?php

namespace App\Services\Pizza\PizzaIngredientFactory;

use App\Entity\Pizza\Pizza;

class ChicagoPizzaIngredientFactory implements PizzaIngredientFactoryInterface
{
    /**
     * @return string
     */
    public function createDough()
    {
        return Pizza::DOUGH_THIN;
    }

    /**
     * @return string
     */
    public function createSauce()
    {
        return Pizza::SAUCE_PLUM;
    }

    /**
     * @return string
     */
    public function createCheese()
    {
        return Pizza::CHEESE_REGGIANO;
    }

    /**
     * @return string
     */
    public function createClam()
    {
        return Pizza::CLAM_FROZEN;
    }
}