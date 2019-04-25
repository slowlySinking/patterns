<?php

namespace App\DataFixtures;


use App\Entity\Duck\DecoyDuck;
use App\Entity\Duck\MallardDuck;
use App\Entity\Duck\RedheadDuck;
use App\Entity\Duck\RubberDuck;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DuckFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $mallardDuck = new MallardDuck('Mallard duck');
        $mallardDuck->setQuack($mallardDuck->performQuack());
        $mallardDuck->setFly($mallardDuck->performFly());
        $manager->persist($mallardDuck);

        $redheadDuck = new RedheadDuck('Redhead duck');
        $redheadDuck->setQuack($redheadDuck->performQuack());
        $redheadDuck->setFly($redheadDuck->performFly());
        $manager->persist($redheadDuck);

        $rubberDuck  = new RubberDuck('Rubber duck');
        $rubberDuck->setQuack($rubberDuck->performQuack());
        $rubberDuck->setFly($rubberDuck->performFly());
        $manager->persist($rubberDuck);

        $decoyDuck   = new DecoyDuck('Decoy duck');
        $decoyDuck->setQuack($decoyDuck->performQuack());
        $decoyDuck->setFly($decoyDuck->performFly());
        $manager->persist($decoyDuck);

        $manager->flush();
    }
}