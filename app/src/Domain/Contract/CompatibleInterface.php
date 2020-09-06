<?php

namespace App\Domain\Contract;

use App\Domain\Collection\AbilityCollection;

interface CompatibleInterface
{
    public function abilities(): AbilityCollection;
}
