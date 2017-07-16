<?php

use Corley\Modular\Loader;
use Corley\FrameworkModule\Test\Client;
use Acclimate\Container\CompositeContainer;
use Doctrine\Common\Annotations\AnnotationRegistry;

$loader = require __DIR__ . '/../vendor/autoload.php';
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

$container = new CompositeContainer();
$modules = new Loader($container);

$modules->prepare(new AppModule(true));

Client::getInstance($modules->getContainer());
