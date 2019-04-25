<?php

namespace App\Services\Duck;

use App\Entity\Duck\Duck;
use App\Services\CoreService;

class DuckService extends CoreService
{
    const ENTITY_NAME = Duck::class;
}