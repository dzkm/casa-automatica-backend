<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use Slim\App;
return function (App $app) {
    $app->get('/rooms', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/rooms"> try /casa/automatica</a>');
        return $response;
    });
    $app->get('/rooms/{id}', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/rooms"> try /casa/automatica</a>');
        return $response;
    });
    $app->post('/rooms', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/rooms"> try /casa/automatica</a>');
        return $response;
    });
    $app->put('/rooms/{id}', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/rooms"> try /casa/automatica</a>');
        return $response;
    });
    $app->delete('/rooms/{id}', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/rooms"> try /casa/automatica</a>');
        return $response;
    });
};