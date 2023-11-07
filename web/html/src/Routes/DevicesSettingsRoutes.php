<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use Slim\App;
return function (App $app) {
    $app->get('/devices.settings', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/devices-settings.home"> try /casa/automatica</a>');
        return $response;
    });
    $app->get('/devices.settings/{id}', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/devices-settings.home"> try /casa/automatica</a>');
        return $response;
    });
    $app->post('/devices.settings', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/devices-settings.home"> try /casa/automatica</a>');
        return $response;
    });
    $app->put('/devices.settings/{id}', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/devices-settings.home"> try /casa/automatica</a>');
        return $response;
    });
    $app->delete('/devices.settings/{id}', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/devices-settings.home"> try /casa/automatica</a>');
        return $response;
    });
};