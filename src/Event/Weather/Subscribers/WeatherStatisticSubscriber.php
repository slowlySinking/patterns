<?php

namespace App\Event\Weather\Subscribers;

use App\Services\Weather\WeatherStatisticService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class WeatherStatisticSubscriber implements EventSubscriberInterface
{
    use WeatherSubscriberTrait;

    /**
     * WeatherStatisticSubscriber constructor.
     * @param WeatherStatisticService $weatherService
     */
    public function __construct(WeatherStatisticService $weatherService)
    {
        $this->weatherService = $weatherService;
    }
}