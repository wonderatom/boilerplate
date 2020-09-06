<?php

namespace App\Domain\Simulator\Exception;

use App\Domain\Contract\ConditionInterface;

class UnfulfillableConditionException extends \Exception
{
    public static function create(ConditionInterface $condition)
    {
        return new self(sprintf('Unfulfillable condition "%s"', $condition));
    }
}