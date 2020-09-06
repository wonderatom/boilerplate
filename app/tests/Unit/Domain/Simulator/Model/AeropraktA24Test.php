<?php

namespace App\Tests\Unit\Domain\Simulator\Model;

use App\Domain\Collection\AbilityCollection;
use App\Domain\Enum\LandTypeEnum;
use App\Domain\Enum\TimeOfDayEnum;
use App\Domain\Enum\WeatherEnum;
use App\Domain\Simulator\Model\AeropraktA24;
use PHPUnit\Framework\TestCase;

class AeropraktA24Test extends TestCase
{
    /** @var AeropraktA24 */
    private $airplane;

    public function setUp()
    {
        $this->airplane = new AeropraktA24();
    }

    public function testLandingGear(): void
    {
        $this->assertEquals(
            $this->airplane->getLandingGear()->abilities(),
            new AbilityCollection([
                new LandTypeEnum(LandTypeEnum::RUNWAY),
                new LandTypeEnum(LandTypeEnum::WATER)
            ])
        );
    }

    public function testAvionics(): void
    {
        $this->assertEquals(
            $this->airplane->getAvionics()->abilities(),
            new AbilityCollection([
                new TimeOfDayEnum(TimeOfDayEnum::DAY),
            ])
        );
    }

    public function getProtectionSystem(): void
    {
        $this->assertEquals(
            $this->airplane->getProtectionSystem()->abilities(),
            new AbilityCollection([
                new WeatherEnum(WeatherEnum::NICE),
            ])
        );
    }
}
