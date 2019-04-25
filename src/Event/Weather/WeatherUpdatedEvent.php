<?php

namespace App\Event\Weather;

use App\Entity\Weather\Weather;
use Symfony\Component\EventDispatcher\Event;

class WeatherUpdatedEvent extends Event
{
    const EVENT_NAME = 'WeatherUpdatedEvent';

    /**
     * @var Weather
     */
    protected $weather;

    /**
     * WeatherUpdatedEvent constructor.
     * @param Weather $weather
     */
    public function __construct(Weather $weather)
    {
        $this->weather = $weather;
    }

    /**
     * @return Weather
     */
    public function getWeather()
    {
        return $this->weather;
    }
}