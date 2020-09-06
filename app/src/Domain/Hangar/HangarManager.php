<?php

namespace App\Domain\Hangar;

use App\Domain\Contract\AircraftInterface;
use App\Domain\Contract\HangarInterface;
use App\Domain\Hangar\Exception\MaxLimitException;
use App\Domain\Hangar\Exception\NotFoundException;
use App\Domain\Simulator\Exception\UnfulfillableConditionException;

class HangarManager
{
    private $hangar;

    public function __construct(HangarInterface $hangar)
    {
        $this->hangar = $hangar;
    }

    /**
     * @throws NotFoundException
     */
    public function takenOut(AircraftInterface $aircraft): bool
    {
        $collection = $this->hangar->getAirplanes();

        if (!$collection->contains($aircraft)) {
            throw NotFoundException::create($aircraft->getName());
        }

        return $collection->removeElement($aircraft);
    }


    /**
     * @throws MaxLimitException
     */
    public function placed(AircraftInterface $aircraft): bool
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