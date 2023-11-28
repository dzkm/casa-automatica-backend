<?php
namespace App\Models;
use DateTime;

class Device{
    private int $id;
    private string $description;
    private DateTime $createdAt;
    private DateTime $updatedAt;
    private DateTime $deletedAt;
    private bool $deleted;

    public function __construct(int $id, string $description, DateTime $createdAt, DateTime $updatedAt, DateTime $deletedAt, bool $deleted){
        $this->id = $id;
        $this->description = $description;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->deletedAt = $deletedAt;
        $this->deleted = $deleted;
    }

	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getDescription(): string {
		return $this->description;
	}

	/**
	 * @return DateTime
	 */
	public function getCreatedAt(): DateTime {
		return $this->createdAt;
	}

	/**
	 * @return DateTime
	 */
	public function getUpdatedAt(): DateTime {
		return $this->updatedAt;
	}

	/**
	 * @return DateTime
	 */
	public function getDeletedAt(): DateTime {
		return $this->deletedAt;
	}

	/**
	 * @return bool
	 */
	public function getDeleted(): bool {
		return $this->deleted;
	}
}