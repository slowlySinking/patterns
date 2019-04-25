<?php

namespace App\Services\Weather;

use App\Entity\Weather\AverageWeather;
use App\Entity\Weather\Weather;
use App\Services\CoreService;

class AverageWeatherService extends CoreService
{
    const ENTITY_NAME = AverageWeather::class;

    /**
     * @param $weather
     */
    public function save($weather)
    {
        $date = new \DateTime();
        $data = $this->em->getRepository(Weather::class)->getAverage();

        $averageWeather = $this->findOneBy([]) ?: new AverageWeather();

        $averageWeather->setTemperature($data['temperature']);
        $averageWeather->setPressure($data['pressure']);
        $averageWeather->setHumidity($data['humidity']);

        $averageWeather->setCreatedAt($date);
        $averageWeather->setUpdatedAt($date);

        parent::save($averageWeather);
    }
}