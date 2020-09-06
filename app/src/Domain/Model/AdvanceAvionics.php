<?php

namespace App\Domain\Model;

use App\Domain\Enum\TimeOfDayEnum;

class AdvanceAvionics extends Avionics
{
    public function __construct()
    {
        parent::__construct();

        $this->collection->add(new TimeOfDayEnum(TimeOfDayEnum::NIGHT));
    }
}
