<?php

namespace App\Domain\Model;

use App\Domain\Collection\AbilityCollection;
use App\Domain\Contract\CompatibleInterface;
use App\Domain\Enum\LandTypeEnum;

class CombinatedLandingGear extends LandingGear implements CompatibleInterface
{
    public function __construct()
    {
        $this->collection = new AbilityCollection([]);
    }

    public function add(LandingGear $landingGear): self
    {
        foreach ($landingGear->abilities()->all() as $ability) {
            $this->collection->add($ability);
        }

        return $this;
    }
}