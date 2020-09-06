<?php

namespace App\Domain\Contract;

interface FlyInterface extends ActionInterface
{
    public function fly(): void;
}