<?php

namespace App\Entity\Pizza;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class CheesePizza extends Pizza
{
    public function __construct()
    {
        $this->name = 'Cheese Pizza';
    }
}