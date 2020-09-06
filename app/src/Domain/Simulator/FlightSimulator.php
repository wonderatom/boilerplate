<?php

namespace App\Domain\Simulator;

use App\Domain\Contract\AirplaneInterface;
use App\Domain\Simulator\Exception\UnfulfillableConditionException;

class FlightSimulator
{
    private $context;

    public function __construct(AirplaneInterface $airplane, Context $context = null)
    {
        $this->context = $context ?? new Context($airplane);
    }

    public function getContext(): Context
    {
        return $this->context;
    }

    public function process(): bool
    {
        $result = true;
        $action = $this->context->getAction();

        try {
            $action->execute($this->context);
        } catch (UnfulfillableConditionException $e) {
            $result = false;
        }

        return $result;
    }
}
