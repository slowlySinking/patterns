<?php

namespace App\Repository\Weather;

use App\Repository\CoreRepository;

class WeatherRepository extends CoreRepository
{
    /**
     * @return mixed
     */
    public function getAverage()
    {
        $qb = $this->createQueryBuilder('w');

        $qb
            ->select('
                AVG(w.temperature) as temperature,
                AVG(w.pressure) as pressure,
                AVG(w.humidity) as humidity
            ')
            ->setMaxResults(1);

        return $qb
            ->getQuery()
            ->getOneOrNullResult();
    }
}