<?php

namespace App\Tests\Functional\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;


class HangarPlaceCommandTest extends KernelTestCase
{
    public function testExecute()
    {
        $kernel = static::createKernel();
        $application = new Application($kernel);

        $command = $application->find('app:hangar:place');
        $commandTester = new CommandTester($command);
        $commandTester->execute([]);

        $this->assertEquals(0, $commandTester->getStatusCode());

        $this->assertStringContainsString('Success!', $commandTester->getDisplay());
    }
}
