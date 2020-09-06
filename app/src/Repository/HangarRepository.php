<?php

namespace App\Repository;

use App\Domain\Contract\HangarInterface;
use App\Domain\Exception\ModelNotFoundException;
use App\Domain\Repository\HangarRepositoryInterface;
use App\Model\Hangar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class HangarRepository extends ServiceEntityRepository implements HangarRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hangar::class);
    }

    public function getByName(string $name): HangarInterface
    {
        $result = $this->findOneBy(['name' => $name]);

        if (!$result instanceof HangarInterface) {
            throw ModelNotFoundException::create('Hangar', 'name', $name);
        }

        return $result;
    }

    public function save(HangarInterface $hangar): void
    {
        $this->getEntityManager()->persist($hangar);
        $this->getEntityManager()->flush();
    }
}
