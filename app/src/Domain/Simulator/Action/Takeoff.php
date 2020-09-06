<?php

namespace App\Domain\Simulator\Action;

use App\Domain\Simulator\Context;
use App\Domain\Simulator\Exception\UnfulfillableConditionException;

class Takeoff extends Action
{
    public function execute(Context $context): void
    {
        $airplane = $context->getAirplane();
        $condition = $context->getConditions();
        $landingGear = $context->getLandingGear();

        foreach ($condition->all() as $condition) {
            if (!in_array($condition, $landingGear->abilities()->all())) {
                throw UnfulfillableConditionException::create($condition);
            }
        }

        $airplane->takeoff();
    }
}