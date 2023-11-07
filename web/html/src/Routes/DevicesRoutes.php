<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use Slim\App;

return function (App $app) {
    $app->get('/devices', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/devices.home"> try /casa/automatica</a>');
        return $response;
    });
    $app->get('/devices/{id}', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/devices.home"> try /casa/automatica</a>');
        return $response;

    });
    $app->post('/devices', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/devices.home"> try /casa/automatica</a>');
        return $response;

    });
    $app->put('/devices/{id}', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/devices.home"> try /casa/automatica</a>');
        return $response;

    });
    $app->delete('/devices/{id}', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/devices.home"> try /casa/automatica</a>');
        return $response;
    });
};