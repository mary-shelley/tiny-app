<?php
use Corley\Modular\Loader;

use Acclimate\Container\CompositeContainer;

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Doctrine\Common\Annotations\AnnotationRegistry;

$loader = require __DIR__ . '/../vendor/autoload.php';
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

$container = new CompositeContainer();
$modules = new Loader($container);

$modules->prepare(new AppModule(true));

$app = $modules->getContainer()->get("app");
$app->setErrorHandler($modules->getContainer()->get("error_handler"));

$request = Request::createFromGlobals();
$response = new Response();

$container->get(RequestContext::class)->fromRequest($request);

$response = $app->run($request, $response);
$response->send();

