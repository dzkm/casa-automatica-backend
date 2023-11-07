<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use Slim\Factory\AppFactory;

require(__DIR__ . "/../vendor/autoload.php");
$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

// TODO: Routes.