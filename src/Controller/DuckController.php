<?php

namespace App\Controller;

use App\Services\Duck\DuckService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class DuckController extends Controller
{
    /**
     * @Route(name="ducks", path="/ducks")
     *
     * @param DuckService $duckService
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getDucksAction(DuckService $duckService)
    {
        $ducks = $duckService->findAll();

        return $this->render('ducks/duck.html.twig', [
            'ducks' => $ducks
        ]);
    }
}