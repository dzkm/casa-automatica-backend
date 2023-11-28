<?php
namespace App\Models;
use DateTime;

class Room{
    private int $id;
    private int $userID;
    private int $houseID;
    private string $description;
    private DateTime $created_at;
    private DateTime $updated_at;
    private DateTime $deleted_at;
    private bool $deleted;

    
    public function __construct(int $id, string $description){
    }
    public function getId(): int{
        return $this->id;
    }
    public function getDescription(): string{
        return $this->description;
    }
    public function toMap(): array{
        return [
            "id"=> $this->id,
            "description"=> $this->description,

        ];
    }
}