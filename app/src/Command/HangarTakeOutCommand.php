<?php

namespace App\Command;

use App\Domain\Contract\HangarInterface;
use App\Domain\Exception\ModelNotFoundException;
use App\Domain\Repository\HangarRepositoryInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HangarTakeOutCommand extends Command
{
    protected static $defaultName = 'app:hangar:take-out';
    private static $hangar = 'Aeropakt';

    private $repository;

    public function __construct(HangarRepositoryInterface $hangarRepository)
    {
        parent::__construct();

        $this->repository = $hangarRepository;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $hangar = $this->getHangar();
        $hangar->takenOut();

        $this->repository->save($hangar);

        return 0;
    }

    private function getHangar(): HangarInterface
    {
        try {
            return $this->repository->getByName(self::$hangar);
        } catch (ModelNotFoundException $e) {
            die(1);
        }
    }
}
