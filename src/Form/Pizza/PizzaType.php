<?php

namespace App\Form\Pizza;

use App\Entity\Pizza\CheesePizza;
use App\Entity\Pizza\ClamPizza;
use App\Entity\Pizza\PepperoniPizza;
use App\Entity\Pizza\VeggiePizza;
use App\Services\Pizza\PizzaStore\PizzaStore;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class PizzaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pizza', ChoiceType::class, [
                'choices' => [
                    new CheesePizza(),
                    new PepperoniPizza(),
                    new ClamPizza(),
                    new VeggiePizza()
                ],
                'choice_label' => function ($pizza) {
                    return $pizza->getName();
                }
            ])
            ->add('city', ChoiceType::class, [
                'choices' => PizzaStore::CITIES,
                'choice_label' => function ($city) {
                    return $city;
                }
            ])
            ->add('button', SubmitType::class, [
                'label' => 'Order pizza'
            ]);
    }
}