<?php

namespace models;

use Database;

require_once './Database.php';

class AdminModel
{
    private $connection;

    public function __construct()
    {
        $this->connection = Database::getInstance()->getConnection();
    }

    public function getStats()
    {
        // TODO
    }

    public function getAdmin($email, $password)
    {
        $select = $this->connection->prepare('SELECT * from admins where email=:email');

        try {
            $select->execute([
                ':email' => $email
            ]);
            $user = $select->fetch(\PDO::FETCH_ASSOC);
            if (!empty($user) && password_verify($password, $user['password'])) {
                return $user;
            }
        } catch (\PDOException $e) {
            echo "There is a error in get admin.";
        }
    }
}
