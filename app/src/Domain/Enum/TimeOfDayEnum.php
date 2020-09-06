<?php

namespace App\Domain\Enum;

use App\Domain\Contract\AbilityInterface;
use App\Domain\Contract\ConditionInterface;
use MyCLabs\Enum\Enum;

class TimeOfDayEnum extends Enum implements AbilityInterface, ConditionInterface
{
    public const DAY = 'day';
    public const NIGHT = 'night';
}
