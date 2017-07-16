<?php
namespace App\Controller;

use Corley\Middleware\Annotations as Middleware;

class IndexController
{
    /**
     * @Middleware\Route("/", methods={"GET"})
     */
    public function indexAction($request, $response)
    {
        return $response->setContent("Hello World");
    }
}
