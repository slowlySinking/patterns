<?php

namespace App\Entity\Pizza;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class PepperoniPizza extends Pizza
{
    public function __construct()
    {
        $this->name = 'Pepperoni Pizza';
    }
}