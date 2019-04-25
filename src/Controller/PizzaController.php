<?php

namespace App\Controller;

use App\Form\Pizza\PizzaType;
use App\Services\Pizza\PizzaService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PizzaController extends Controller
{
    /**
     * @Route(name="pizza", path="/pizza/index")
     *
     * @param PizzaService $pizzaService
     * @return Response
     */
    public function pizzaAction(PizzaService $pizzaService)
    {
        $pizzas = $pizzaService->findBy([], ['createdAt' => 'DESC']);

        return $this->render('pizza/pizza.html.twig', [
            'pizzas' => $pizzas
        ]);
    }

    /**
     * @Route(name="pizza_create", path="/pizza/create")
     *
     * @param Request $request
     * @param PizzaService $pizzaService
     * @return RedirectResponse|Response
     */
    public function createAction(Request $request,PizzaService $pizzaService)
    {
        $form = $this->createForm(PizzaType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $requestData = $form->getData();

            $pizza = $requestData['pizza'];
            $city = $requestData['city'];
            $pizzaService->orderPizza($pizza, $city);

            return $this->redirectToRoute('pizza');
        }

        return $this->render('pizza/create_pizza_form.html.twig', [
            'form' => $form->createView()
        ]);
    }
}