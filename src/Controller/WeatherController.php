<?php

namespace App\Controller;

use App\Entity\Weather\Weather;
use App\Form\Observer\WeatherType;
use App\Services\Weather\AverageWeatherService;
use App\Services\Weather\CurrentWeatherService;
use App\Services\Weather\WeatherService;
use App\Services\Weather\WeatherStatisticService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class WeatherController extends Controller
{
    /**
     * @Route(name="weather", path="/weather/index")
     *
     * @param CurrentWeatherService $currentWeatherService
     * @param AverageWeatherService $averageWeatherService
     * @param WeatherStatisticService $weatherStatisticService
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function weatherAction(
        CurrentWeatherService $currentWeatherService,
        AverageWeatherService $averageWeatherService,
        WeatherStatisticService $weatherStatisticService
    )
    {
        $data = [
            'currentWeather'   => $currentWeatherService->findOneBy([]),
            'averageWeather'   => $averageWeatherService->findOneBy([]),
            'weatherStatistic' => $weatherStatisticService->findAll()
        ];

        return $this->render('weather/weather.html.twig', [
            'data' => $data
        ]);
    }

    /**
     * @Route(name="weather_create", path="weather/create")
     *
     * @param Request $request
     * @param WeatherService $weatherService
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request, WeatherService $weatherService)
    {
        $form = $this->createForm(WeatherType::class, new Weather());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $weather = $form->getData();
            $weatherService->save($weather);

            return $this->redirectToRoute('weather');
        }

        return $this->render('weather/create_weather_form.html.twig', [
            'form' => $form->createView()
        ]);
    }
}