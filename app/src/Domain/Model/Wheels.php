<?php

namespace App\Domain\Model;

use App\Domain\Collection\AbilityCollection;
use App\Domain\Enum\LandTypeEnum;

class Wheels extends LandingGear
{
    public function __construct()
    {
        $this->collection = new AbilityCollection([new LandTypeEnum(LandTypeEnum::RUNWAY)]);
    }
}
