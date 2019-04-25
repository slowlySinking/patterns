<?php

namespace App\Event\Weather\Subscribers;

use App\Event\Weather\WeatherUpdatedEvent;
use App\Services\Weather\WeatherService;

trait WeatherSubscriberTrait
{
    /**
     * @var WeatherService
     */
    private $weatherService;

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            WeatherUpdatedEvent::EVENT_NAME => 'onWeatherUpdated'
        ];
    }

    /**
     * @param WeatherUpdatedEvent $event
     */
    public function onWeatherUpdated(WeatherUpdatedEvent $event)
    {
        $weather = $event->getWeather();
        $this->weatherService->save($weather);
    }

}