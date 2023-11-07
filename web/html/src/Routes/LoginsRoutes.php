<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use Slim\App;
return function (App $app) {
    $app->get('/logins', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/logins"> try /casa/automatica</a>');
        return $response;
    });
    $app->get('/logins/{id}', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/logins"> try /casa/automatica</a>');
        return $response;
    });
    $app->post('/logins', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/logins"> try /casa/automatica</a>');
        return $response;
    });
    $app->put('/logins/{id}', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/logins"> try /casa/automatica</a>');
        return $response;
    });
    $app->delete('/logins/{id}', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/logins"> try /casa/automatica</a>');
        return $response;
    });
};