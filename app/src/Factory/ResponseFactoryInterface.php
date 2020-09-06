<?php

namespace App\Factory;

use Symfony\Component\HttpFoundation\Response;

interface ResponseFactoryInterface
{
    public const JSON_FORMAT = 'json';

    /**
     * @param mixed $data
     */
    public function create($data, int $status = Response::HTTP_OK): Response;
}
