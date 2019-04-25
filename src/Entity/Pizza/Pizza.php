<?php

namespace App\Entity\Pizza;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Pizza\PizzaRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *     "pizza"            = "Pizza",
 *     "cheese_pizza"     = "CheesePizza",
 *     "clam_pizza"       = "ClamPizza",
 *     "pepperoni_pizza"  = "PepperoniPizza",
 *     "veggie_pizza"     = "VeggiePizza",
 * })
 */
class Pizza
{
    const DOUGH_THIN = 'thin';
    const DOUGH_THICK = 'thick';

    const SAUCE_PLUM = 'plum';
    const SAUCE_MARINARA = 'marinara';

    const CHEESE_REGGIANO = 'reggiano';
    const CHEESE_MOZZARELLA = 'mozzarella';

    const CLAM_FRESH = 'fresh';
    const CLAM_FROZEN = 'frozen';

    use TimestampableEntity;

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
     * @ORM\Column(type="string", length=255)
     */
    protected $dough;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $sauce;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $cheese;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $clam;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Pizza
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDough()
    {
        return $this->dough;
    }

    /**
     * @param string $dough
     * @return Pizza
     */
    public function setDough(string $dough)
    {
        $this->dough = $dough;
        return $this;
    }

    /**
     * @return string
     */
    public function getSauce()
    {
        return $this->sauce;
    }

    /**
     * @param string $sauce
     * @return Pizza
     */
    public function setSauce(string $sauce)
    {
        $this->sauce = $sauce;
        return $this;
    }

    /**
     * @return string
     */
    public function getCheese()
    {
        return $this->cheese;
    }

    /**
     * @param string $cheese
     * @return Pizza
     */
    public function setCheese(string $cheese)
    {
        $this->cheese = $cheese;
        return $this;
    }

    /**
     * @return string
     */
    public function getClam()
    {
        return $this->clam;
    }

    /**
     * @param string $clam
     * @return Pizza
     */
    public function setClam(string $clam)
    {
        $this->clam = $clam;
        return $this;
    }
}