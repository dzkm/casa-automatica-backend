<?php

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handler;

require(__DIR__ . "/../vendor/autoload.php");
$dependencies = require(__DIR__ . "/../src/Configuration/Dependencies.php");
$settings = require(__DIR__ . "/../src/Configuration/Settings.php");

$containerBuilder = new ContainerBuilder;
$settings($containerBuilder);
$dependencies($containerBuilder);
$container = $containerBuilder->build();

AppFactory::setContainer($container);
$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

/*
=============================
==========MIDDLEWARE=========
=============================
*/
$app->add(function (Request $request, Handler $handler){
    $response = $handler->handle($request);
    return $response->withHeader('Content-Type', 'application/json');
});

/*
=============================
==========ROUTES=============
=============================
*/
$housesRoutes = require(__DIR__ . '/../src/Routes/HousesRoutes.php');
$housesRoutes($app);

$devicesRoutes = require(__DIR__ . '/../src/Routes/DevicesRoutes.php');
$devicesRoutes($app);

$devicesTypesRoutes = require(__DIR__ . '/../src/Routes/DevicesTypesRoutes.php');
$devicesTypesRoutes($app);

$devicesSettingsRoutes = require(__DIR__ . '/../src/Routes/DevicesSettingsRoutes.php');
$devicesSettingsRoutes($app);

$loginsRoutes = require(__DIR__ . '/../src/Routes/LoginsRoutes.php');
$loginsRoutes($app);

$usersRoutes = require(__DIR__ . '/../src/Routes/UsersRoutes.php');
$usersRoutes($app);

$roomsRoutes = require(__DIR__ . '/../src/Routes/RoomsRoutes.php');
$roomsRoutes($app);

/*
=============================
===========START=============
=============================
*/

$app->run();