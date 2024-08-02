<?php

declare(strict_types=1);

class Users
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    public function addUser(int $chat_id, string $action): bool
    {
        $check = $this->pdo->query("SELECT * FROM users WHERE user_id={$chat_id}")->fetch();
        if (!$check) {
            $user = $this->pdo->prepare("INSERT INTO users (user_id, action) VALUES (:user_id, :action)");
            $user->bindParam(':user_id', $chat_id);
            $user->bindParam(':action', $action);
            return $user->execute();
        }

        return $this->setAction($chat_id, $action);
    }

    public function setAction(int $chat_id, string $action): bool
    {
        $user = $this->pdo->prepare("UPDATE users SET action = :action WHERE user_id = :user_id");
        $user->bindParam(':user_id', $chat_id);
        $user->bindParam(':action', $action);

        return $user->execute();
    }

    public function getUser(int $chat_id): array
    {
        return $this->pdo->query("SELECT * FROM users WHERE user_id={$chat_id}")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function setNoteId(int $chat_id, int $note_id): bool
    {
        $user = $this->pdo->prepare("UPDATE users SET note_id = :note_id WHERE user_id = :user_id");
        $user->bindParam(':user_id', $chat_id);
        $user->bindParam(':note_id', $note_id);

        return $user->execute();
    }
    public function create()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email    = $_POST['email'];
            $password = $_POST['password'];

            $_SESSION['email'] = $email;

            $stmt = $this->pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $result = $stmt->execute();

            header('location: /');

            //echo $result ? 'New record created successfully' : 'Something went wrong';
        }
    }

    public function register()
    {
        if ($this->isuserExists()) {
            echo 'Bu email allaqachon roʻyxatdan oʻtgan';
        } else {
            $this->create();
            header('location: /');
        }
    }


    public function isuserExists(): bool
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email    = $_POST['email'];
            $stmt = $this->pdo->prepare("SELECT email FROM users Where email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return (bool) $stmt->fetch();
        }
    }
    public function login(){
        // if ($this -> isuserExists() == true) {
        //     header('location: /');
        // }else{
        //     echo "Bu email ro'yxtdan o'tmagan";
        // }
    }



 


}
