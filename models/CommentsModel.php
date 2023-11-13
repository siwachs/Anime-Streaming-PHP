<?php

namespace models;

use Database;

require_once './Database.php';

class CommentsModel
{
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

    private function getComments($queryString, $showId = null, $limit = null)
    {
        if (isset($limit)) {
            $queryString .= ' LIMIT :limit';
        }

        $select = $this->connection->prepare($queryString);
        if (isset($limit)) {
            $select->bindParam(':limit', $limit, \PDO::PARAM_INT);
        }

        if (isset($showId)) {
            $select->bindParam(':showId', $showId, \PDO::PARAM_INT);
        }

        try {
            $select->execute();
            return $select->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo 'There is a Error in Query';
            return null;
        }
    }

    public function getCommentsByShowId($showId)
    {
        $queryString = 'SELECT * FROM comments WHERE show_id = :showId';
        return $this->getComments($queryString, $showId);
    }
}