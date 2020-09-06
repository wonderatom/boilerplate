<?php

namespace App\Command;

use App\Domain\Contract\HangarInterface;
use App\Domain\Exception\ModelNotFoundException;
use App\Domain\Repository\HangarRepositoryInterface;
use App\Domain\Simulator\Model\AeropraktA24;
use App\Domain\Simulator\Model\Boeing747;
use App\Domain\Simulator\Model\CurtissNC4;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HangarPlaceCommand extends Command
{
    protected static $defaultName = 'app:hangar:place';

    private static $hangar = 'Aeropakt';
    private static $airplanes = [
        Boeing747::class,
        CurtissNC4::class,
        AeropraktA24::class
    ];

    private $repository;

    public function __construct(HangarRepositoryInterface $hangarRepository)
    {
        parent::__construct();

        $this->repository = $hangarRepository;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $hangar = $this->getHangar();

        $airplane = new self::$airplanes[rand(0,2)]();

        $hangar->place($airplane);

        $this->repository->save($hangar);

        $output->writeln(sprintf('Success! New airplane %s added in hangar', $airplane->getName()));

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
