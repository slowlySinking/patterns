<?php

namespace App\Entity\Weather;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Weather\CurrentWeatherRepository")
 */
class CurrentWeather extends Weather
{
}