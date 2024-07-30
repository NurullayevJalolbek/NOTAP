<?php

declare(strict_types=1);

class Note
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    public function add(string $text, int $userId=1): bool
    {

        $stmt   = $this->pdo->prepare("INSERT INTO notes (text, user_id, created_at) VALUES (:text, :userId, NOW())");
        $stmt->bindParam(':text', $text);
        $stmt->bindParam(':userId', $userId);
        return $stmt->execute();
    }

    public function getAll(): false|array
    {
        return $this->pdo->query("SELECT * FROM notes")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOneUserId(int $userId): false|array
    {
        return $this->pdo->query("SELECT * FROM notes WHERE user_id={$userId}")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getId(int $id): false|array
    {
        return $this->pdo->query("SELECT * FROM notes WHERE id={$id}")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM notes WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getTask(int $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM notes WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function updateNote(int $id, string $text): bool
    {
        $stmt = $this->pdo->prepare("UPDATE notes SET text=:text WHERE id=:id");
        $stmt->bindParam(':text', $text);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}