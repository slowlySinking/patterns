<?php

namespace App\Services\Weather;

use App\Entity\Weather\Weather;
use App\Event\Weather\WeatherUpdatedEvent;
use App\Services\CoreService;

class WeatherService extends CoreService
{
    const ENTITY_NAME = Weather::class;

    /**
     * @param $weather
     */
    public function save($weather)
    {
        $date = new \DateTime();
        $weather->setCreatedAt($date);
        $weather->setUpdatedAt($date);

        parent::save($weather);

        $event = new WeatherUpdatedEvent($weather);
        $this->dispatcher->dispatch(WeatherUpdatedEvent::EVENT_NAME, $event);
    }
}