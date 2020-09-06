<?php

namespace App\Domain\Repository;

use App\Domain\Contract\HangarInterface;
use App\Domain\Exception\ModelNotFoundException;

interface HangarRepositoryInterface
{
    /***
     * @throws ModelNotFoundException
     */
    public function getByName(string $name): HangarInterface;

    public function save(HangarInterface $hangar): void;
}
