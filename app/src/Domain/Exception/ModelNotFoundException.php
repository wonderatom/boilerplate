<?php

namespace App\Domain\Exception;

class ModelNotFoundException extends \Exception
{
    public static function create(string $model, string $fieldName, string $value)
    {
        return new self(sprintf('%s with %s "%s" does not exist', $model, $fieldName, $value));
    }
}
