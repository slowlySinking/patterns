<?php

namespace App\Event\Weather\Subscribers;


use App\Services\Weather\CurrentWeatherService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CurrentWeatherSubscriber implements EventSubscriberInterface
{
    use WeatherSubscriberTrait;

    /**
     * CurrentWeatherSubscriber constructor.
     * @param CurrentWeatherService $weatherService
     */
    public function __construct(CurrentWeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }
}