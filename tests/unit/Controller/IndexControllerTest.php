<?php
namespace App\Controller;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class IndexControllerTest extends TestCase
{
    public function testSayHello()
    {
        $controller = new IndexController();

        $request = Request::create("/");
        $response = new Response();

        $response = $controller->indexAction($request, $response);

        $this->assertEquals("Hello World", $response->getContent());
    }
}

