<?php
namespace App\Models;

class House{
    public function __construct(private int $id, private int $userID, private string $description){

    }

    public function getId(): int{
        return $this->id;
    }
    public function getUserID(): int{
        return $this->userID;
    }
    public function getDescription(): string{
        return $this->description;
    }
}