<?php

namespace App\Entity\Pizza;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class VeggiePizza extends Pizza
{
    public function __construct()
    {
        $this->name = 'Veggie Pizza';
    }
}