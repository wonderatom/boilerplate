<?php

namespace App\Domain\Simulator\Model;

use App\Domain\Model\Airplane;
use App\Domain\Model\Avionics;
use App\Domain\Model\Pontoons;
use App\Domain\Model\ProtectionSystem;

class CurtissNC4 extends Airplane
{
    private const NAME = 'Curtiss NC-4';

    public function __construct()
    {
        parent::__construct(new Pontoons(), new Avionics(), new ProtectionSystem());

        $this->name = self::NAME;
    }
}