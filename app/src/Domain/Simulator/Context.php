<?php

namespace App\Domain\Simulator;

use App\Domain\Collection\ConditionCollection;
use App\Domain\Contract\AirplaneInterface;
use App\Domain\Model\Avionics;
use App\Domain\Model\LandingGear;
use App\Domain\Model\ProtectionSystem;
use App\Domain\Simulator\Action\Action;

class Context
{
    private $airplane;
    private $conditions;
    private $landingGear;
    private $avionics;
    private $protectionSystem;
    private $action;

    public function __construct(AirplaneInterface $airplane, ConditionCollection $conditions = null)
    {
        $this->airplane = $airplane;
        $this->conditions = $conditions ?? new ConditionCollection();
        $this->protectionSystem = $airplane->getProtectionSystem();
        $this->avionics = $airplane->getAvionics();
        $this->landingGear = $airplane->getLandingGear();
    }

    public function getConditions(): ConditionCollection
    {
        return $this->conditions;
    }

    public function setConditions(ConditionCollection $collection): self
    {
        $this->conditions = $collection;

        return $this;
    }

    public function getAirplane(): AirplaneInterface
    {
        return $this->airplane;
    }

    public function getProtectionSystem(): ProtectionSystem
    {
        return $this->protectionSystem;
    }

    public function getLandingGear(): LandingGear
    {
        return $this->landingGear;
    }

    public function getAvionics(): Avionics
    {
        return $this->avionics;
    }

    public function setAction(Action $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function getAction(): Action
    {
        return $this->action;
    }
}