<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use Slim\App;
return function (App $app) {
    $app->get('/devices.types', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/devices-types.home"> try /casa/automatica</a>');
        return $response;
    
    });
    $app->get('/devices.types/{id}', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/devices-types.home"> try /casa/automatica</a>');
        return $response;
    
    });
    $app->post('/devices.types', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/devices-types.home"> try /casa/automatica</a>');
        return $response;
    
    });
    $app->put('/devices.types/{id}', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/devices-types.home"> try /casa/automatica</a>');
        return $response;
    
    });
    $app->delete('/devices.types/{id}', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/devices-types.home"> try /casa/automatica</a>');
        return $response;
    });
};