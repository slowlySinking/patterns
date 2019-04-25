<?php

namespace App\Entity\Pizza;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class ClamPizza extends Pizza
{
    public function __construct()
    {
        $this->name = 'Clam Pizza';
    }
}