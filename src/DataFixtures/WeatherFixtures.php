<?php

namespace App\DataFixtures;

use App\Entity\Weather\AverageWeather;
use App\Entity\Weather\CurrentWeather;
use App\Entity\Weather\Weather;
use App\Entity\Weather\WeatherStatistic;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class WeatherFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        $count = 10;
        $temperatureSum = $pressureSum = $humiditySum = 0;
        $weatherData = $weatherStatisticData = [];

        for ($i = 0; $i < $count; $i++) {
            $date = new \DateTime('-' . $i . ' days');
            $temperature = $faker->numberBetween(Weather::TEMPERATURE_RANGE['min'], Weather::TEMPERATURE_RANGE['max']);
            $pressure = $faker->numberBetween(Weather::PRESSURE_RANGE['min'], Weather::PRESSURE_RANGE['max']);
            $humidity = $faker->numberBetween(Weather::HUMIDITY_RANGE['min'], Weather::HUMIDITY_RANGE['max']);

            $weatherData[] = [
                'createdAt'   => $date,
                'updatedAt'   => $date,
                'temperature' => $temperature,
                'pressure'    => $pressure,
                'humidity'    => $humidity
            ];

            $temperatureSum += $temperature;
            $pressureSum += $pressure;
            $humiditySum += $humidity;

            $weatherStatisticData[] = 'The weather on ' . $date->format('Y-m-d H:i:s') . ":\n" .
                'Temperature: ' . $temperature . '°C' . "\n" .
                'Pressure: ' . $pressure . 'mmHg' . "\n" .
                'Humidity: ' . $humidity . '%.';
        }

        // Set Weather
        foreach ($weatherData as $data) {
            $this->setWeatherData($manager, new Weather(), $data);
        }

        // Set CurrentWeather
        $this->setWeatherData($manager, new CurrentWeather(), $weatherData[0]);

        // Set AverageWeather
        $averageWeatherData = [
            'createdAt'   => $weatherData[$count - 1]['createdAt'],
            'updatedAt'   => $weatherData[$count - 1]['updatedAt'],
            'temperature' => $temperatureSum/$count,
            'pressure'    => $pressureSum/$count,
            'humidity'    => $humiditySum/$count
        ];
        $this->setWeatherData($manager, new AverageWeather(), $averageWeatherData);

        // Set WeatherStatistic
        foreach ($weatherStatisticData as $data) {
            $weatherStatistic = new WeatherStatistic();
            $weatherStatistic->setRecord($data);

            $manager->persist($weatherStatistic);
        }

        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     * @param Weather $weather
     * @param array $data
     */
    private function setWeatherData(ObjectManager $manager, Weather $weather, array $data)
    {
        $weather->setCreatedAt($data['createdAt']);
        $weather->setUpdatedAt($data['updatedAt']);
        $weather->setTemperature($data['temperature']);
        $weather->setPressure($data['pressure']);
        $weather->setHumidity($data['humidity']);

        $manager->persist($weather);
    }
}