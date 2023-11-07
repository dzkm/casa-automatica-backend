<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use Slim\App;

return function (App $app) {
    $app->get('/houses', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/houses"> try /casa/automatica</a>');
        return $response;
    });
    $app->get('/houses/{id}', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/houses"> try /casa/automatica</a>');
        return $response;
    });
    $app->post('/houses', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/houses"> try /casa/automatica</a>');
        return $response;

    });
    $app->put('/houses/{id}', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/houses"> try /casa/automatica</a>');
        return $response;

    });
    $app->delete('/houses/{id}', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/houses"> try /casa/automatica</a>');
        return $response;
    });
};