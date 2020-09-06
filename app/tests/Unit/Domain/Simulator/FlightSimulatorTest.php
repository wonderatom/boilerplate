<?php

namespace App\Tests\Unit\Domain\Simulator;

use App\Domain\Enum\WeatherEnum;
use App\Domain\Model\Airplane;
use App\Domain\Simulator\Action\Action;
use App\Domain\Simulator\Context;
use App\Domain\Simulator\Exception\UnfulfillableConditionException;
use App\Domain\Simulator\FlightSimulator;
use PHPUnit\Framework\TestCase;

class FlightSimulatorTest extends TestCase
{
    /** @var Airplane|\PHPUnit_Framework_MockObject_MockObject */
    private $airplane;

    /** @var Action|\PHPUnit_Framework_MockObject_MockObject */
    private $action;

    /** @var Context|\PHPUnit_Framework_MockObject_MockObject */
    private $context;

    protected function setUp(): void
    {
        $this->context = $this->createMock(Context::class);
        $this->airplane = $this->createMock(Airplane::class);
        $this->action = $this->createMock(Action::class);
    }

    public function testActionProcessedSuccess(): void
    {
        $this->context
            ->expects($this->once())
            ->method('getAction')
            ->willReturn($this->action);

        $this->action
            ->expects($this->once())
            ->method('execute')
            ->with($this->context);

        $this->assertTrue((new FlightSimulator($this->airplane, $this->context))->process());
    }

    public function testActionProcessedFail(): void
    {
        $this->context
            ->expects($this->once())
            ->method('getAction')
            ->willReturn($this->action);

        $this->action
            ->expects($this->once())
            ->method('execute')
            ->willThrowException(UnfulfillableConditionException::create(new WeatherEnum(WeatherEnum::BAD)));

        $this->assertFalse((new FlightSimulator($this->airplane, $this->context))->process());
    }
}
