<?php

namespace App\Entity\Duck;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Duck\DuckRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="category", type="string")
 * @ORM\DiscriminatorMap({
 *     "mallard_duck" = "MallardDuck",
 *     "redhead_duck" = "RedheadDuck",
 *     "rubber_duck"  = "RubberDuck",
 *     "decoy_duck"   = "DecoyDuck",
 * })
 */
abstract class Duck
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="guid")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @var \QuackBehaviorInterface
     */
    protected $quackBehavior;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $quack;

    /**
     * @var \FlyBehaviorInterface
     */
    protected $flyBehavior;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $fly;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Duck
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuack()
    {
        return $this->quack;
    }

    /**
     * @param $quack
     * @return $this
     */
    public function setQuack($quack)
    {
        $this->quack = $quack;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFly()
    {
        return $this->fly;
    }

    /**
     * @param $fly
     * @return $this
     */
    public function setFly($fly)
    {
        $this->fly = $fly;

        return $this;
    }

    /**
     * @return mixed
     */
    public function performQuack()
    {
        return $this->quackBehavior->quack();
    }

    /**
     * @return mixed
     */
    public function performFly()
    {
        return $this->flyBehavior->fly();
    }
}
