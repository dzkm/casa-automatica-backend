<?php
declare(strict_types=1);
namespace App\Controllers;
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
        $query = $this->db->select("rooms", "*");
        return $query;
    }
    public function getHouseRooms(Request $request, Response $response, int $houseID){
        $query = $this->db->select("rooms", [], "*", ["house_id" => $houseID]);
        return $query;
    }

    public function getUserRooms(Request $request, Response $response, int $userID){
        $query = $this->db->select("rooms", [], "*", ["user_id" => $userID]);
        return $query;
    }

    public function getRoomByID(Request $request, Response $response, int $roomID){
        $query = $this->db->select("rooms", [], "*", ["id"=> $roomID]);
        return $query;
    }
}