<?php

namespace models;

use Database;

require_once './Database.php';

class EpisodesModel
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

    public function getEpisodeById($showId, $epId)
    {
        $queryString = 'SELECT episodes.id AS epId, episodes.show_id AS showId, episodes.video AS video, episodes.video_thumbnail AS thumbnail, episodes.title AS epTitle, shows.title AS showTitle, shows.genres AS genres FROM episodes LEFT JOIN shows ON shows.id = episodes.show_id WHERE episodes.show_id = :showId AND episodes.id = :epId';
        $select = $this->connection->prepare($queryString);
        try {
            $select->execute([
                ':showId' => $showId,
                ':epId' => $epId
            ]);
            return $select->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo EpisodesModel::ERROR_MESSAGE;
        }
    }

    public function getEpisodesById($showId)
    {
        $queryString = 'SELECT * FROM episodes WHERE show_id = :showId';
        $select = $this->connection->prepare($queryString);
        try {
            $select->execute([
                ':showId' => $showId
            ]);
            return $select->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo EpisodesModel::ERROR_MESSAGE;
        }
    }
}
