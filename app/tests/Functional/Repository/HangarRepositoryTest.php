<?php

namespace App\Tests\Functional\Repository;

use App\Domain\Exception\ModelNotFoundException;
use App\Domain\Repository\HangarRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class HangarRepositoryTest extends KernelTestCase
{
    /**
     * @var HangarRepositoryInterface
     */
    private $hangarRepository;

    protected function setUp(): void
    {
        self::bootKernel();

        $this->hangarRepository = self::$container->get(HangarRepositoryInterface::class);
    }

    public function testGetByName()
    {
        $name = 'Aeropakt';

        $hangar = $this->hangarRepository->getByName($name);

        $this->assertSame($name, $hangar->getName());
        $this->assertCount(10, $hangar->getAirplanes());
    }

    public function testModelNotFoundException()
    {
        $name = 'blabla';

        $this->expectException(ModelNotFoundException::class);
        $this->expectExceptionMessage((ModelNotFoundException::create('Hangar', 'name', $name))->getMessage());

        $this->hangarRepository->getByName($name);
    }

    protected function tearDown(): void
    {
        self::$container->get('doctrine')->getManager()->close();

        parent::tearDown();
    }
}
