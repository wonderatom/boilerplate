<?php

namespace App\Tests\Functional\Controller\V1;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class HangarControllerTest extends WebTestCase
{
    private $client;
    private $router;

    public function setUp()
    {
        $this->client = self::createClient();
        $this->router = self::$container->get('router');
    }

    public function testAirplanesSuccess(): void
    {
        $this->client->request('GET', $this->router->generate('api.hangar.airplanes', ['name' => 'Aeropakt']));

        $this->assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
        $this->assertEquals('{"id":1,"name":"Aeropakt","airplanes":[{"id":1,"name":"Aeroprakt A-24"},{"id":2,"name":"Aeroprakt A-24"},{"id":3,"name":"Aeroprakt A-24"},{"id":4,"name":"Aeroprakt A-24"},{"id":5,"name":"Aeroprakt A-24"},{"id":6,"name":"Curtiss NC-4"},{"id":7,"name":"Curtiss NC-4"},{"id":8,"name":"Curtiss NC-4"},{"id":9,"name":"Boeing 747"},{"id":10,"name":"Boeing 747"}]}', $this->client->getResponse()->getContent());
    }

    public function testHangarNotFound(): void
    {
        $this->client->request('GET', $this->router->generate('api.hangar.airplanes', ['name' => 'blabla']));

        $this->assertEquals(Response::HTTP_NOT_FOUND, $this->client->getResponse()->getStatusCode());
        $this->assertEquals('{"error":"Hangar with name \"blabla\" does not exist"}', $this->client->getResponse()->getContent());
    }
}
