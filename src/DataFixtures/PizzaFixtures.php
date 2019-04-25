<?php

namespace App\DataFixtures;

use App\Entity\Pizza\CheesePizza;
use App\Entity\Pizza\ClamPizza;
use App\Entity\Pizza\PepperoniPizza;
use App\Entity\Pizza\Pizza;
use App\Entity\Pizza\VeggiePizza;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class PizzaFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        $cheesePizza = new CheesePizza();
        $cheesePizza->setName($cheesePizza->getName() . ' (New York Pizza Store)');
        $cheesePizza->setDough(Pizza::DOUGH_THICK);
        $cheesePizza->setSauce(Pizza::SAUCE_MARINARA);
        $cheesePizza->setCheese(Pizza::CHEESE_MOZZARELLA);
        $cheesePizza->setClam(Pizza::CLAM_FRESH);
        $cheesePizza->setUpdatedAt(new \DateTime('-' . $faker->numberBetween(1, 19) . ' days'));
        $cheesePizza->setCreatedAt(new \DateTime('-' . $faker->numberBetween(1, 19) . ' days'));
        $manager->persist($cheesePizza);

        $pepperoniPizza = new PepperoniPizza();
        $pepperoniPizza->setName($pepperoniPizza->getName() . ' (Chicago Pizza Store)');
        $pepperoniPizza->setDough(Pizza::DOUGH_THIN);
        $pepperoniPizza->setSauce(Pizza::SAUCE_PLUM);
        $pepperoniPizza->setCheese(Pizza::CHEESE_REGGIANO);
        $pepperoniPizza->setClam(Pizza::CLAM_FROZEN);
        $pepperoniPizza->setUpdatedAt(new \DateTime('-' . $faker->numberBetween(1, 19) . ' days'));
        $pepperoniPizza->setCreatedAt(new \DateTime('-' . $faker->numberBetween(1, 19) . ' days'));
        $manager->persist($pepperoniPizza);

        $clamPizza = new ClamPizza();
        $clamPizza->setName($clamPizza->getName() . ' (New York Pizza Store)');
        $clamPizza->setDough(Pizza::DOUGH_THICK);
        $clamPizza->setSauce(Pizza::SAUCE_MARINARA);
        $clamPizza->setCheese(Pizza::CHEESE_MOZZARELLA);
        $clamPizza->setClam(Pizza::CLAM_FRESH);
        $clamPizza->setUpdatedAt(new \DateTime('-' . $faker->numberBetween(1, 19) . ' days'));
        $clamPizza->setCreatedAt(new \DateTime('-' . $faker->numberBetween(1, 19) . ' days'));
        $manager->persist($clamPizza);

        $veggiePizza = new VeggiePizza();
        $veggiePizza->setName($veggiePizza->getName() . ' (Chicago Pizza Store)');
        $veggiePizza->setDough(Pizza::DOUGH_THIN);
        $veggiePizza->setSauce(Pizza::SAUCE_PLUM);
        $veggiePizza->setCheese(Pizza::CHEESE_REGGIANO);
        $veggiePizza->setClam(Pizza::CLAM_FROZEN);
        $veggiePizza->setUpdatedAt(new \DateTime('-' . $faker->numberBetween(1, 19) . ' days'));
        $veggiePizza->setCreatedAt(new \DateTime('-' . $faker->numberBetween(1, 19) . ' days'));
        $manager->persist($veggiePizza);

        $manager->flush();
    }
}