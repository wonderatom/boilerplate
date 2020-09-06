<?php

namespace App\Model;

use App\Domain\Contract\AirplaneInterface;
use App\Domain\Contract\HangarInterface;
use Doctrine\Common\Collections\ArrayCollection;

class Hangar implements HangarInterface
{
    private $id;
    private $name;
    private $airplanes;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->airplanes = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAirplanes(): iterable
    {
        return $this->airplanes;
    }

    public function place(AirplaneInterface $airplane): void
    {
        $this->airplanes->add(new Airplane($airplane));
    }

    public function takenOut(): void
    {
        $this->airplanes->removeElement($this->airplanes->last());
    }
}