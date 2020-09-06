<?php

namespace App\Domain\Model;

use App\Domain\Collection\AbilityCollection;
use App\Domain\Enum\LandTypeEnum;

class Pontoons extends LandingGear
{
    public function __construct()
    {
        $this->collection = new AbilityCollection([new LandTypeEnum(LandTypeEnum::WATER)]);
    }
}