<?php

namespace App\Domain\Model;

use App\Domain\Contract\AirplaneInterface;

abstract class Airplane implements AirplaneInterface
{
    private $landingGear;
    private $avionics;
    private $protectionSystem;
    protected $name;

    public function __construct(LandingGear $landingGear, Avionics $avionics, ProtectionSystem $protectionSystem)
    {
        $this->landingGear = $landingGear;
        $this->avionics = $avionics;
        $this->protectionSystem = $protectionSystem;
    }

    public function getLandingGear(): LandingGear
    {
        return $this->landingGear;
    }

    public function getAvionics(): Avionics
    {
        return $this->avionics;
    }

    public function getProtectionSystem(): ProtectionSystem
    {
        return $this->protectionSystem;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function fly(): void
    {
        // change some airplane state, etc
    }

    public function landing(): void
    {
        // prepare to landing, etc
    }

    public function takeoff(): void
    {
        // check system, etc
    }
}
