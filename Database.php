<?php

require_once './config.php';

class Database
{
    private static $instance;
    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USER, PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro in DB connection.";
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
