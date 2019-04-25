<?php

namespace App\Event\Weather\Subscribers;

use App\Services\Weather\AverageWeatherService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AverageWeatherSubscriber implements EventSubscriberInterface
{
    use WeatherSubscriberTrait;
    
    public function __construct(AverageWeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }
}