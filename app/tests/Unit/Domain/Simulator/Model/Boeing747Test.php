<?php

namespace App\Tests\Unit\Domain\Simulator\Model;

use App\Domain\Collection\AbilityCollection;
use App\Domain\Enum\LandTypeEnum;
use App\Domain\Enum\TimeOfDayEnum;
use App\Domain\Enum\WeatherEnum;
use App\Domain\Simulator\Model\Boeing747;
use PHPUnit\Framework\TestCase;

class Boeing747Test extends TestCase
{
    /** @var Boeing747 */
    private $airplane;

    public function setUp()
    {
        $this->airplane = new Boeing747();
    }

    public function testLandingGear(): void
    {
        $this->assertEquals(
            $this->airplane->getLandingGear()->abilities(),
            new AbilityCollection([
                new LandTypeEnum(LandTypeEnum::RUNWAY)
            ])
        );
    }

    public function testAvionics(): void
    {
        $this->assertEquals(
            $this->airplane->getAvionics()->abilities(),
            new AbilityCollection([
                new TimeOfDayEnum(TimeOfDayEnum::DAY),
                new TimeOfDayEnum(TimeOfDayEnum::NIGHT),
            ])
        );
    }

    public function getProtectionSystem(): void
    {
        $this->assertEquals(
            $this->airplane->getProtectionSystem()->abilities(),
            new AbilityCollection([
                new WeatherEnum(WeatherEnum::NICE),
                new WeatherEnum(WeatherEnum::BAD),
            ])
        );
    }
}