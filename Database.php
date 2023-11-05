<?php

class Database
{
    private static $instance;
    private $connection;

    public function __construct()
    {
        require_once './config.php';
        try {
            $this->connection = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USER, PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "" . $e->getMessage() . "";
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
