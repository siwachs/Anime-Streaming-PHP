<?php

namespace models;

use Database;

require_once './Database.php';

class AuthModel
{
    private $connection;

    public function __construct()
    {
        $this->connection = Database::getInstance()->getConnection();
    }

    public function createUser($username, $email, $password)
    {
        $insert = $this->connection->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');

        try {
            $insert->execute([
                ':username' => $username,
                ':email' => $email,
                ':password' => password_hash($password, PASSWORD_DEFAULT),
            ]);
        } catch (\PDOException $e) {
            echo "There is a error in create user.";
        }
    }

    public function getUser($email, $password)
    {
        $select = $this->connection->prepare('SELECT * from users where email=:email');

        try {
            $select->execute([
                ':email' => $email
            ]);
            $user = $select->fetch(\PDO::FETCH_ASSOC);
            if (!empty($user) && password_verify($password, $user['password'])) {
                return $user;
            }
        } catch (\PDOException $e) {
            echo "There is a error in get user.";
        }
    }

    public function isUserExist($email)
    {
        $select = $this->connection->prepare('SELECT * from users where email=:email');

        try {
            $select->execute([
                ':email' => $email
            ]);
            return $select->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "There is a error in get user.";
        }
    }
}
