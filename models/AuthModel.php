<?php

namespace models;

use Database;

require_once './Database.php';

class AuthModel
{
    private $connection;
    private $username;
    private $email;
    private $password;

    public function __construct()
    {
        $this->connection = Database::getInstance()->getConnection();
    }

    public function setAll($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = \password_hash($password, PASSWORD_DEFAULT);
    }

    public function getAll()
    {
        return [
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password
        ];
    }

    public function setEmailAndPassword($email, $password)
    {
        $this->email = $email;
        $this->password = \password_hash($password, PASSWORD_DEFAULT);
    }

    public function getEmailAndPassword()
    {
        return [
            'email' => $this->email,
            'password' => $this->password
        ];
    }

    public function createUser()
    {
        $insert = $this->connection->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');

        try {
            $insert->execute([
                ':username' => $this->username,
                ':email' => $this->email,
                ':password' => $this->password
            ]);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
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
            if ($user && password_verify($password, $user['password'])) {
                return $user;
            } else {
                return null;
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
}
