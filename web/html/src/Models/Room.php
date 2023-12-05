<?php
namespace App\Models;
use DateTime;

class Room{
    private int|null $id;
    private int $userID;
    private int $houseID;
    private string $description;
    private DateTime $created_at;
    private DateTime|null $updated_at;
    private DateTime|null $deleted_at;
    private bool $deleted;

    public static function fromDecodedJson(array $jsonDecoded): Room{
        $roomID = $jsonDecoded["id"] ?? null;
        $userID = $jsonDecoded["house_id"] ?? 0;
        $houseID = $jsonDecoded["user_id"] ?? 0;
        $description = $jsonDecoded["description"] ?? "Sem descrição";
        $created_at = @DateTime::createFromFormat("Y-m-d H:i:s", $jsonDecoded["created_at"]) ?: new DateTime("now", new \DateTimeZone("America/Sao_Paulo"));
        $updated_at = @DateTime::createFromFormat("Y-m-d H:i:s", $jsonDecoded["updated_at"]) ?: null;
        $deleted_at = @DateTime::createFromFormat("Y-m-d H:i:s", $jsonDecoded["deleted_at"]) ?: null;
        $deleted = $jsonDecoded["deleted"] > 0 ? true : false;

        return new Room($description, $created_at, $roomID, $userID, $houseID, $updated_at, $deleted_at, $deleted);
    }

    public function __construct(string $description, DateTime $created_at, int|null $id, int|null $userID, int|null $houseID, DateTime|null $updated_at, DateTime|null $deleted_at, bool $deleted){
        $this->id = $id;
        $this->description = $description;
        $this->created_at = $created_at;
        $this->userID = $userID;
        $this->houseID = $houseID;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
        $this->deleted = $deleted;
    }
    public function getId(): int{
        return $this->id;
    }
    public function setId(int $value): void{
        if(is_null($this->id)){
            $this->id = $value;
        }
    }
    public function getDescription(): string{
        return $this->description;
    }
    public function getUserID(): int{
        return $this->userID;
    }
    public function getHouseID(): int{
        return $this->houseID;
    }
    public function getCreatedAt(): DateTime{
        return $this->created_at;
    }
    public function getUpdatedAt(): DateTime{
        return $this->updated_at;
    }
    public function getDeletedAt(): DateTime{
        return $this->deleted_at;
    }
    public function getDeleted(): bool{
        return $this->deleted;
    }
    public function setDescription(string $value): void{
        $this->description = $value;
    }
    public function setHouseID(int $value): void{
        $this->houseID = $value;
    }
    public function setUpdatedAt(DateTime $value): void{
        $this->updated_at = $value;
    }
    public function setDeletedAt(DateTime $value): void{
        $this->deleted_at = $value;
    }
    public function setDeleted(bool $value): void{
        $this->deleted = $value;
    }
    public function toMap(): array{
        return [
            "id"=> $this->id,
            "user_id" => $this->userID,
            "house_id" => $this->houseID,
            "description"=> $this->description,
            "created_at" => $this->created_at->format("Y-m-d H:i:s"),
            "updated_at" => empty($this->updated_at) ?: $this->updated_at->format("Y-m-d H:i:s"),
            "deleted_at" => empty($this->deleted_at) ?: $this->deleted_at->format("Y-m-d H:i:s"),
            "deleted" => $this->deleted,
        ];
    }
}