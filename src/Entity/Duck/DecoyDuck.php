<?php

namespace App\Entity\Duck;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class DecoyDuck extends Duck
{
    /**
     * @param string $name
     */
    public function __construct($name)
    {
        parent::__construct($name);

        $this->quackBehavior = new \MuteQuack();
        $this->flyBehavior = new \FlyNoWay();
    }
}
