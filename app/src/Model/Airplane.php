<?php

namespace App\Model;

use App\Domain\Contract\AirplaneInterface;

class Airplane
{
    private $id;
    private $name;

    public function __construct(AirplaneInterface $airplane)
    {
        $this->name = $airplane->getName();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}