<?php
namespace App\Integration\Controller;

use PHPUnit\Framework\TestCase;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Corley\FrameworkModule\Test\Client;

class IndexControllerTest extends TestCase
{
    public function testSayHello()
    {
        $request = Request::create("/");
        $response = Client::getInstance()->request($request);

        $this->assertEquals("Hello World", $response->getContent());
    }

    public function testSayHelloMissing()
    {
        $request = Request::create("/hello");
        $response = Client::getInstance()->request($request);

        $this->assertEquals(404, $response->getStatusCode());
    }
}

