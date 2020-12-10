<?php

declare(strict_types=1);

use Slim\Factory\AppFactory;
use Slim\Views\TwigMiddleware;
use Vaalyn\HsbRc3\Controller;

require __DIR__ . '/../vendor/autoload.php';

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$containerBuilder = new DI\ContainerBuilder();
$containerBuilder->useAutowiring(true);

$containerBuilder->addDefinitions(require __DIR__ . '/../config/services.php');

$container = $containerBuilder->build();

$app = AppFactory::createFromContainer($container);

$app->add(TwigMiddleware::create(
	$app,
	$container->get(Slim\Views\Twig::class)
));

$app->post('/validate-code', Controller\CodeController::class);

$app->map(['GET', 'POST'], '/{type}', Controller\IndexController::class);

$app->run();
