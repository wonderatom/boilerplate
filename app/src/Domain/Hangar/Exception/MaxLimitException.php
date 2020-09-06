<?php

namespace App\Domain\Hangar\Exception;

class MaxLimitException extends \Exception
{
    public static function create(int $limit)
    {
        return new self(sprintf('Max limit %d', $limit));
    }
}