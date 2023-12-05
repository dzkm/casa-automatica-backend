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
    private const TABLE_NAME = "rooms";
    public function __construct(ContainerInterface $containerInterface) {
        $this->db = $containerInterface->get('medoo');
    }
    public function getAllRooms(Request $request, Response $response){
        $query = $this->db->select(self::TABLE_NAME, "*", ["deleted" => 0]);
        $response->getBody()->write(json_encode($query));
        return $response;
    }

    public function getAllRoomsAndDeleted(Request $request, Response $response){
        $query = $this->db->select(self::TABLE_NAME, "*");
        $response->getBody()->write(json_encode($query));
        return $response;
    }

    public function getRoomByID(Request $request, Response $response, array $args){
        $query = $this->db->get(self::TABLE_NAME, "*", ["id"=> $args['id']]);
        if(empty($query)){
            return $response->withStatus(404, "This room does not exist");
        }
        if($query["deleted"] == 1){
            return $response->withStatus(403, "This room is deleted");
        }
        $response->getBody()->write(json_encode($query));
        return $response;
    }

    public function createRoom(Request $request, Response $response){
        $roomData = $request->getParsedBody();
        if(empty(json_decode($roomData))){
            return $response->withStatus(400, "Invalid request");
        }
        if(!empty($roomData["id"])){
            $roomData["id"] = null;
        }
        $roomObject = Room::fromDecodedJson($roomData);
        $roomInsert = $this->db->insert(self::TABLE_NAME, $roomObject->toMap());
        $response->getBody()->write(json_encode(["Rows affected" => $roomInsert->rowCount(), "Object" => $roomObject->toMap()]));
        return $response;
    }

    public function updateRoom(Request $request, Response $response, array $args){
        $roomData = $request->getParsedBody();

        $oldRoomQuery = $this->db->get(self::TABLE_NAME, "*", ["id" => $args["id"]]);
        if(empty($oldRoomQuery)){
            return $response->withStatus(404, "This room does not exist");
        }
        $oldRoomObject = Room::fromDecodedJson($oldRoomQuery);
        if($oldRoomObject->getDeleted()){
            return $response->withStatus(403, "This room is deleted");
        }
        $roomObject = Room::fromDecodedJson($roomData);
        $roomObject->setId($args["id"]);
        $roomObject->setUpdatedAt((new \DateTime()));
        $roomUpdated = $this->db->update(self::TABLE_NAME, $roomObject->toMap(), ["id" => $args["id"]]);
        
        $response->getBody()->write(json_encode(["Rows Affected" => $roomUpdated->rowCount(), "Old" => $oldRoomObject->toMap(), "New" => $roomObject->toMap()]));
        return $response;
    }

    public function deleteRoom(Request $request, Response $response, array $args){
        $roomQuery = $this->db->get(self::TABLE_NAME, "*", ["id" => $args["id"]]);
        if(empty($roomQuery)){
            return $response->withStatus(404, "This room does not exist");
        }
        $roomObject = Room::fromDecodedJson($roomQuery);
        if($roomObject->getDeleted()){
            return $response->withStatus(400, "Room is already deleted");
        }
        $roomObject->setDeletedAt((new \DateTime()));
        $roomObject->setDeleted(true);
        $query = $this->db->update(self::TABLE_NAME, $roomObject->toMap(), ["id" => $args['id']]);
        $response->getBody()->write(json_encode(["Rows affected" => $query->rowCount()]));
        return $response;
    }
}