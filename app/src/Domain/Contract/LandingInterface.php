<?php

namespace App\Domain\Contract;

interface LandingInterface extends ActionInterface
{
    public function landing(): void;
}