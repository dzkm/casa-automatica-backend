<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use Slim\App;
return function (App $app) {
    $app->get('/users', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/users"> try /casa/automatica</a>');
        return $response;
    });
    $app->get('/users/{id}', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/users"> try /casa/automatica</a>');
        return $response;
    });
    $app->post('/users', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/users"> try /casa/automatica</a>');
        return $response;
    });
    $app->put('/users/{id}', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/users"> try /casa/automatica</a>');
        return $response;
    });
    $app->delete('/users/{id}', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/users"> try /casa/automatica</a>');
        return $response;
    });
};