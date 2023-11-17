<?php

namespace models;

use Database;

require_once './Database.php';

class GenresModel
{
    const ERROR_MESSAGE = 'There is a Error in Query';

    private static $instance;
    private $connection;

    public function __construct()
    {
        $this->connection = Database::getInstance()->getConnection();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function getGenres($queryString, $limit = null)
    {
        if (isset($limit)) {
            $queryString .= ' LIMIT :limit';
        }
        $select = $this->connection->prepare($queryString);
        if (isset($limit)) {
            $select->bindParam(':limit', $limit, \PDO::PARAM_INT);
        }

        try {
            $select->execute();
            return $select->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo GenresModel::ERROR_MESSAGE;
        }
    }

    public function getAllGenres($limit = null)
    {
        $queryString = 'SELECT genres.name FROM genres';
        return $this->getGenres($queryString, $limit);
    }
}
