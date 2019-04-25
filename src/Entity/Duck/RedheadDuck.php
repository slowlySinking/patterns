<?php

namespace App\Entity\Duck;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class RedheadDuck extends Duck
{
    /**
     * @param string $name
     */
    public function __construct($name)
    {
        parent::__construct($name);

        $this->quackBehavior = new \Quack();
        $this->flyBehavior = new \FlyWithWings();
    }
}
