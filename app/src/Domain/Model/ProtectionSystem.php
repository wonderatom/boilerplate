<?php

namespace App\Domain\Model;

use App\Domain\Collection\AbilityCollection;
use App\Domain\Contract\CompatibleInterface;
use App\Domain\Enum\WeatherEnum;

class ProtectionSystem implements CompatibleInterface
{
    protected $collection;

    public function __construct()
    {
        $this->collection = new AbilityCollection([
            new WeatherEnum(WeatherEnum::NICE),
        ]);
    }

    public function abilities(): AbilityCollection
    {
        return $this->collection;
    }
}