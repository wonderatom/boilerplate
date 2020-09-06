<?php

namespace App\Domain\Simulator\Model;

use App\Domain\Model\AdvanceAvionics;
use App\Domain\Model\AdvanceProtectionSystem;
use App\Domain\Model\Airplane;
use App\Domain\Model\Avionics;
use App\Domain\Model\Pontoons;
use App\Domain\Model\ProtectionSystem;
use App\Domain\Model\Wheels;

class Boeing747 extends Airplane
{
    private const NAME = 'Boeing 747';

    public function __construct()
    {
        parent::__construct(new Wheels(), new AdvanceAvionics(), new AdvanceProtectionSystem());

        $this->name = self::NAME;
    }
}