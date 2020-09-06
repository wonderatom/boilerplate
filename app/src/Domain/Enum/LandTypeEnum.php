<?php

namespace App\Domain\Enum;

use App\Domain\Contract\AbilityInterface;
use App\Domain\Contract\ConditionInterface;
use MyCLabs\Enum\Enum;

class LandTypeEnum extends Enum implements AbilityInterface, ConditionInterface
{
    public const RUNWAY = 'runway';
    public const WATER = 'water';
}
