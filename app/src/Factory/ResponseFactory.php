<?php

namespace App\Factory;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ResponseFactory implements ResponseFactoryInterface
{
    private $serializer;

    public function __construct()
    {
        $this->serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);;
    }

    public function create($data, int $status = Response::HTTP_OK): Response
    {
        return JsonResponse::fromJsonString($this->serializer->serialize($data, self::JSON_FORMAT), $status);
    }
}
