<?php

namespace App\Domain\Model;

use App\Domain\Collection\AbilityCollection;
use App\Domain\Contract\CompatibleInterface;

abstract class LandingGear implements CompatibleInterface
{
    protected $collection;

    public function abilities(): AbilityCollection
    {
        return $this->collection;
    }
}