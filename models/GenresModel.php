<?php

namespace models;

use Database;

require_once './Database.php';

class GenresModel
{
    private $connection;

    public function __construct()
    {
        $this->connection = Database::getInstance()->getConnection();
    }

    private function getGenres($queryString, $limit = null)
    {
        if (isset($limit)) {
            $queryString .= ' LIMIT ' . $limit;
        }
        $query = $this->connection->query($queryString);
        try {
            $query->execute();
            return $query->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo 'There is a Error in Query';
            return null;
        }
    }

    public function getAllGenres($limit = null)
    {
        $queryString = 'SELECT * FROM genres';
        return $this->getGenres($queryString, $limit);
    }
}
