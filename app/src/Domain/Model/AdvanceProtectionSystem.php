<?php

namespace App\Domain\Model;

use App\Domain\Enum\WeatherEnum;

class AdvanceProtectionSystem extends ProtectionSystem
{
    public function __construct()
    {
        parent::__construct();

        $this->collection->add(new WeatherEnum(WeatherEnum:: BAD));
    }
}