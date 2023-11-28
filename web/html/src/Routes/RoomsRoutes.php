<?php
declare(strict_types=1);
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use Slim\App;
use App\Controllers\RoomController;
use Medoo\Medoo;
return function (App $app) {
    $container = $app->getContainer();

    $app->get('/rooms', function (Request $request, Response $response) use ($container){
        $controller = $container->get(RoomController::class);
        $response->getBody()->write(json_encode($controller->getAllRooms($request, $response)));
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