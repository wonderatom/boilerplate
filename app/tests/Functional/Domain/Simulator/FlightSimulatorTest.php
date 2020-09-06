<?php

namespace App\Tests\Functional\Domain\Simulator;

use App\Domain\Collection\ConditionCollection;
use App\Domain\Contract\AirplaneInterface;
use App\Domain\Enum\LandTypeEnum;
use App\Domain\Enum\TimeOfDayEnum;
use App\Domain\Enum\WeatherEnum;
use App\Domain\Simulator\Action\Action;
use App\Domain\Simulator\Action\Fly;
use App\Domain\Simulator\Action\Landing;
use App\Domain\Simulator\Action\Takeoff;
use App\Domain\Simulator\FlightSimulator;
use App\Domain\Simulator\Model\AeropraktA24;
use App\Domain\Simulator\Model\Boeing747;
use App\Domain\Simulator\Model\CurtissNC4;
use PHPUnit\Framework\TestCase;

class FlightSimulatorTest extends TestCase
{
    /**
     * @dataProvider flyDataProvider
     * @dataProvider landingDataProvider
     * @dataProvider takeOffDataProvider
     */
    public function testFly(AirplaneInterface $airplane, Action $action, array $conditions, bool $expectedResult): void
    {
        $flightSimulator = new FlightSimulator($airplane);

        $context = $flightSimulator
            ->getContext()
            ->setAction($action);

        foreach ($conditions as $key => $collection) {
            $context->setConditions($collection);
            $this->assertEquals($flightSimulator->process(), $expectedResult);
        }

    }

    public function flyDataProvider(): iterable
    {
        yield [
            'airplane' => new CurtissNC4(),
            'action' => new Fly(),
            'condition' => [
                'day time + nice weather' => new ConditionCollection([
                    new WeatherEnum(WeatherEnum::NICE),
                    new TimeOfDayEnum(TimeOfDayEnum::DAY),
                ]),
            ],
            'expectedResult' => true,
        ];

        yield [
            'airplane' => new CurtissNC4(),
            'action' => new Fly(),
            'condition' => [
                'night time + bad weather' => new ConditionCollection([
                    new WeatherEnum(WeatherEnum::BAD),
                    new TimeOfDayEnum(TimeOfDayEnum::NIGHT),
                ]),
                'night time + nice weather' => new ConditionCollection([
                    new WeatherEnum(WeatherEnum::NICE),
                    new TimeOfDayEnum(TimeOfDayEnum::NIGHT),
                ]),
                'day time + bad weather' => new ConditionCollection([
                    new WeatherEnum(WeatherEnum::BAD),
                    new TimeOfDayEnum(TimeOfDayEnum::DAY),
                ]),
            ],
            'expectedResult' => false,
        ];
    }

    public function landingDataProvider(): iterable
    {
        yield [
            'airplane' => new AeropraktA24(),
            'action' => new Landing(),
            'condition' => [
                'runway + water' => new ConditionCollection([
                    new LandTypeEnum(LandTypeEnum::WATER),
                    new LandTypeEnum(LandTypeEnum::RUNWAY),
                ]),
            ],
            'expectedResult' => true,
        ];

        yield [
            'airplane' => new Boeing747(),
            'action' => new Landing(),
            'condition' => [
                'runway' => new ConditionCollection([
                    new LandTypeEnum(LandTypeEnum::RUNWAY),
                ]),
            ],
            'expectedResult' => true,
        ];

        yield [
            'airplane' => new CurtissNC4(),
            'action' => new Landing(),
            'condition' => [
                'runway' => new ConditionCollection([
                    new LandTypeEnum(LandTypeEnum::RUNWAY),
                ]),
            ],
            'expectedResult' => false,
        ];
    }

    public function takeOffDataProvider(): iterable
    {
        yield [
            'airplane' => new AeropraktA24(),
            'action' => new Takeoff(),
            'condition' => [
                'runway + water' => new ConditionCollection([
                    new LandTypeEnum(LandTypeEnum::WATER),
                    new LandTypeEnum(LandTypeEnum::RUNWAY),
                ]),
                'water' => new ConditionCollection([
                    new LandTypeEnum(LandTypeEnum::WATER),
                ]),
                'runway' => new ConditionCollection([
                    new LandTypeEnum(LandTypeEnum::RUNWAY),
                ]),
            ],
            'expectedResult' => true,
        ];

        yield [
            'airplane' => new Boeing747(),
            'action' => new Takeoff(),
            'condition' => [
                'runway' => new ConditionCollection([
                    new LandTypeEnum(LandTypeEnum::RUNWAY),
                ]),
            ],
            'expectedResult' => true,
        ];

        yield [
            'airplane' => new AeropraktA24(),
            'action' => new Takeoff(),
            'condition' => [
                'runway' => new ConditionCollection([
                    new LandTypeEnum(LandTypeEnum::WATER),
                ]),
            ],
            'expectedResult' => true,
        ];
    }
}