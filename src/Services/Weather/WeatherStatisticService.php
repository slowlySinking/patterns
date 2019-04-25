<?php

namespace App\Services\Weather;

use App\Entity\Weather\WeatherStatistic;
use App\Services\CoreService;

class WeatherStatisticService extends CoreService
{
    const ENTITY_NAME = WeatherStatistic::class;

    /**
     * @param $weather
     */
    public function save($weather)
    {
        $weatherStatistic = new WeatherStatistic();

        $record = 'The weather on ' . $weather->getCreatedAt()->format('Y-m-d H:i:s') . ":\n" .
        'Temperature: ' . $weather->getTemperature() . '°C' . "\n" .
        'Pressure: ' . $weather->getPressure() . 'mmHg' . "\n" .
        'Humidity: ' . $weather->getHumidity() . '%.';

        $weatherStatistic->setRecord($record);
        parent::save($weatherStatistic);
    }
}