<?php

namespace models;

use Database;

require_once './Database.php';

class EpisodesModel
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

    public function getEpisode($showId, $epId)
    {
        $queryString = 'SELECT * FROM episodes WHERE show_id = :showId AND id = :epId';
        $select = $this->connection->prepare($queryString);
        try {
            $select->execute([
                ':showId' => $showId,
                ':epId' => $epId
            ]);
            return $select->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo 'There is a Error in Query';
            return null;
        }
    }

    public function getEpisodes($showId)
    {
        $queryString = 'SELECT * FROM episodes WHERE show_id = :showId';
        $select = $this->connection->prepare($queryString);
        try {
            $select->execute([
                ':showId' => $showId
            ]);
            return $select->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo 'There is a Error in Query';
            return null;
        }
    }
}
