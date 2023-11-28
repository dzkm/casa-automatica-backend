<?php
declare(strict_types=1);
namespace App\Controllers;
use App\Models\Room;
use Medoo\Medoo;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
class RoomController{
    private Medoo $db;
    public function __construct(ContainerInterface $containerInterface) {
        $this->db = $containerInterface->get('medoo');
    }
    public function getAllRooms(Request $request, Response $response){
        $query = $this->db->select("rooms", "*", ["deleted" => 1]);
        $response->getBody()->write(json_encode($query));
        return $response;
    }

    public function getRoomByID(Request $request, Response $response, array $args){
        $query = $this->db->select("rooms", "*", ["id"=> $args['id']]);
        $response->getBody()->write(json_encode($query));
        return $response;
    }

    public function createRoom(Request $request, Response $response){
        $roomData = $request->getParsedBody();
        $roomObject = new Room($roomData['description']);
        $roomInsert = $this->db->insert("rooms", $roomObject->toMap());
        $response->getBody()->write(json_encode(["Result" => $roomInsert, "Object" => $roomObject->toMap()]));
        return $response;
    }

    public function deleteRoom(Request $request, Response $response, array $args){
        $query = $this->db->update("rooms", ["deleted" => 1], ["id" => $args['id']]);
        $response->getBody()->write("DELETED");
        return $response;
    }
}