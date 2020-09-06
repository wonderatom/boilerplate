<?php

namespace App\Domain\Contract;

use App\Domain\Model\Avionics;
use App\Domain\Model\LandingGear;
use App\Domain\Model\ProtectionSystem;

interface AirplaneInterface extends AircraftInterface, FlyInterface, LandingInterface, TakeoffInterface
{
    public function getLandingGear(): LandingGear;

    public function getAvionics(): Avionics;

    public function getProtectionSystem(): ProtectionSystem;
}