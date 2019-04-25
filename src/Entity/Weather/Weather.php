<?php

namespace App\Entity\Weather;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Weather\WeatherRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="kind", type="string")
 * @ORM\DiscriminatorMap({
 *     "weather" = "Weather",
 *     "current_weather" = "CurrentWeather",
 *     "average_weather" = "AverageWeather",
 * })
 */
class Weather
{
    use TimestampableEntity;

    const TEMPERATURE_RANGE = [
        'min' => -89.2,
        'max' => 58.7
    ];

    const PRESSURE_RANGE = [
        'min' => 654.8,
        'max' => 812
    ];

    const HUMIDITY_RANGE = [
        'min' => 30,
        'max' => 75
    ];

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="guid")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", scale=1)
     * @Assert\Range(
     *     min = -89.2,
     *     max = 58.7
     * )
     */
    private $temperature;

    /**
     * @ORM\Column(type="decimal", scale=1)
     * @Assert\Range(
     *     min = 654.8,
     *     max = 812
     * )
     */
    private $pressure;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *     min = 30,
     *     max = 75
     * )
     */
    private $humidity;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * @param $temperature
     * @return $this
     */
    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPressure()
    {
        return $this->pressure;
    }

    /**
     * @param $pressure
     * @return $this
     */
    public function setPressure($pressure)
    {
        $this->pressure = $pressure;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHumidity()
    {
        return $this->humidity;
    }

    /**
     * @param $humidity
     * @return $this
     */
    public function setHumidity($humidity)
    {
        $this->humidity = $humidity;

        return $this;
    }
}