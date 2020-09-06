<?php

namespace App\Domain\Contract;

interface TakeoffInterface extends ActionInterface
{
    public function takeoff(): void;
}