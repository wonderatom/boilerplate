<?php

namespace App\Domain\Simulator\Action;

use App\Domain\Simulator\Context;
use App\Domain\Contract\ActionInterface;
use App\Domain\Simulator\Exception\UnfulfillableConditionException;

abstract class Action implements ActionInterface
{
    /**
     * @throws UnfulfillableConditionException
     */
    abstract public function execute(Context $context): void;
}
