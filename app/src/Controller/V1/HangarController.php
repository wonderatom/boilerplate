<?php

namespace App\Controller\V1;

use App\Domain\Exception\ModelNotFoundException;
use App\Domain\Repository\HangarRepositoryInterface;
use App\Factory\ResponseFactoryInterface;
use Symfony\Component\HttpFoundation\Response;

class HangarController
{
    private $repository;
    private $responseFactory;

    public function __construct(HangarRepositoryInterface $repository, ResponseFactoryInterface $responseFactory)
    {
        $this->repository = $repository;
        $this->responseFactory = $responseFactory;
    }

    public function airplanes(string $name): Response
    {
        try {
            $hangar = $this->repository->getByName($name);
            $response = $this->responseFactory->create($hangar);
        } catch (ModelNotFoundException $e) {
            $response = $this->responseFactory->create(['error' => $e->getMessage()], 404);
        }

        return $response;
    }
}