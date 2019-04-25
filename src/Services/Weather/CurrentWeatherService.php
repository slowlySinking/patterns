<?php

namespace App\Services\Weather;

use App\Entity\Weather\CurrentWeather;
use App\Services\CoreService;

class CurrentWeatherService extends CoreService
{
    const ENTITY_NAME = CurrentWeather::class;

    /**
     * @param $weather
     */
    public function save($weather)
    {
        $date = new \DateTime();
        $currentWeather = $this->findOneBy([]) ?: new CurrentWeather();

        $currentWeather->setTemperature($weather->getTemperature());
        $currentWeather->setPressure($weather->getPressure());
        $currentWeather->setHumidity($weather->getHumidity());

        $currentWeather->setCreatedAt($date);
        $currentWeather->setUpdatedAt($date);

        parent::save($currentWeather);
    }
}