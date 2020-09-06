<?php

namespace App\Domain\Simulator\Model;

use App\Domain\Model\Airplane;
use App\Domain\Model\Avionics;
use App\Domain\Model\CombinatedLandingGear;
use App\Domain\Model\Pontoons;
use App\Domain\Model\ProtectionSystem;
use App\Domain\Model\Wheels;

class AeropraktA24 extends Airplane
{
    private const NAME = 'Aeroprakt A-24';

    public function __construct()
    {
        $landingGear = (new CombinatedLandingGear())
            ->add(new Wheels())
            ->add(new Pontoons());

        parent::__construct($landingGear, new Avionics(), new ProtectionSystem());

        $this->name = self::NAME;
    }
}