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
        
    }
}
