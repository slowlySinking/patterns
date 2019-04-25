<?php

namespace App\Services\Pizza\PizzaIngredientFactory;

interface PizzaIngredientFactoryInterface
{
    public function createDough();

    public function createSauce();

    public function createCheese();

    public function createClam();
}