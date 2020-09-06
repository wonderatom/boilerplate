<?php

namespace App\Domain\Hangar\Exception;

class NotFoundException extends \Exception
{
    public static function create(string $name): self
    {
        return new self(sprintf('Not found %s', $name));
    }
}