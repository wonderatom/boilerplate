<?php

namespace App\Domain\Model;

use App\Domain\Collection\AbilityCollection;
use App\Domain\Contract\CompatibleInterface;
use App\Domain\Enum\TimeOfDayEnum;

class Avionics implements CompatibleInterface
{
    protected $collection;

    public function __construct()
    {
        $this->collection = new AbilityCollection([
            new TimeOfDayEnum(TimeOfDayEnum::DAY),
        ]);
    }

    public function abilities(): AbilityCollection
    {
        return $this->collection;
    }
}
