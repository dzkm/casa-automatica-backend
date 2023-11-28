<?php
declare(strict_types=1);
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use Slim\App;
use App\Controllers\RoomController;
return function (App $app) {
    $container = $app->getContainer();
    
    $app->get("/rooms", [RoomController::class, 'getAllRooms']);

    $app->get("/rooms/{id}", [RoomController::class, 'getRoomByID']);

    $app->post("/rooms", [RoomController::class, 'createRoom']);

    $app->put('/rooms/{id}', function (Request $request, Response $response) {
        $response->getBody()->write('<a href="/rooms"> try /casa/automatica</a>');
        return $response;
    });
    $app->delete('/rooms/{id}', [RoomController::class, 'deleteRoom']);

};