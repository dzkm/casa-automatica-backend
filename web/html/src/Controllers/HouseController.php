<?php
declare(strict_types=1);
namespace App\Controllers;
use App\Models\House;
use Medoo\Medoo;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
class HouseController{
    private Medoo $db;
    public function __construct(ContainerInterface $containerInterface) {
        $this->db = $containerInterface->get('medoo');
    }

    public function getHouses(Request $request, Response $response){
        $query = $this->db->select("houses", "*", ["deleted" => 0]);
        $response->getBody()->write(json_encode($query));
        return $response;
    }
}