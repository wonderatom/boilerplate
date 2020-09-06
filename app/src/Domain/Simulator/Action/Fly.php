<?php

namespace App\Domain\Simulator\Action;

use App\Domain\Simulator\Context;
use App\Domain\Simulator\Exception\UnfulfillableConditionException;

class Fly extends Action
{
    public function execute(Context $context): void
    {
        $airplane = $context->getAirplane();
        $condition = $context->getConditions();
        $avionics = $context->getAvionics();
        $protectionSystem = $context->getProtectionSystem();

        foreach ($condition->all() as $condition) {
            if (!in_array($condition, $avionics->abilities()->all()) &&
                !in_array($condition, $protectionSystem->abilities()->all())) {
                throw UnfulfillableConditionException::create($condition);
            }
        }

        $airplane->fly();
    }
}