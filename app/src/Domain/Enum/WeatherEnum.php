<?php

namespace App\Domain\Enum;

use App\Domain\Contract\AbilityInterface;
use App\Domain\Contract\ConditionInterface;
use MyCLabs\Enum\Enum;

class WeatherEnum extends Enum implements AbilityInterface, ConditionInterface
{
    public const NICE = 'nice';
    public const BAD = 'bad';
}
