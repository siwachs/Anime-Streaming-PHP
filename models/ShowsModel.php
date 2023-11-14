<?php

namespace models;

use Database;

require_once './Database.php';

class ShowsModel
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

    private function getShows($queryString, $id = null, $limit = null)
    {
        if (isset($limit)) {
            $queryString .= ' LIMIT :limit';
        }

        $select = $this->connection->prepare($queryString);
        if (isset($limit)) {
            $select->bindParam(':limit', $limit, \PDO::PARAM_INT);
        }

        if (isset($id)) {
            $select->bindParam(':id', $id, \PDO::PARAM_INT);
        }

        try {
            $select->execute();
            return $select->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo ShowsModel::ERROR_MESSAGE;
            return null;
        }
    }

    public function getAllShows($limit = null)
    {
        $queryString = 'SELECT * FROM shows';
        return $this->getShows($queryString, $limit);
    }

    public function getTrendingShows($limit = null)
    {
        $queryString = 'SELECT shows.id AS id, shows.poster_image AS poster, shows.title as title, shows.num_of_episodes_avail AS numOfEpisodesAvail, shows.total_num_of_episodes AS totalEpisodes, shows.genres AS genres, COUNT(views.show_id) AS numOfViews FROM shows JOIN views ON shows.id = views.show_id GROUP BY(shows.id) ORDER BY numOfViews DESC';
        return $this->getShows($queryString, $limit);
    }

    public function getShowsByGenre($genre, $limit = null)
    {
        $queryString = "SELECT shows.id AS id, shows.poster_image AS poster, shows.thumbnail_image AS thumbnail, shows.title as title, shows.num_of_episodes_avail AS numOfEpisodesAvail, shows.total_num_of_episodes AS totalEpisodes, shows.genres AS genres, COUNT(views.show_id) AS numOfViews FROM shows LEFT JOIN views ON shows.id = views.show_id WHERE shows.genres LIKE '%" . $genre . "%' GROUP BY shows.id ORDER BY shows.id DESC";
        return $this->getShows($queryString, $limit);
    }

    public function getRecentlyAddedShows($limit = null)
    {
        $queryString = 'SELECT shows.id AS id, shows.poster_image AS poster, shows.title as title, shows.num_of_episodes_avail AS numOfEpisodesAvail, shows.total_num_of_episodes AS totalEpisodes, shows.genres AS genres, COUNT(views.show_id) AS numOfViews FROM shows LEFT JOIN views ON shows.id = views.show_id GROUP BY(shows.id) ORDER BY shows.created_at DESC';
        return $this->getShows($queryString, $limit);
    }

    public function getShowById($id)
    {
        $queryString = 'SELECT shows.id AS id, shows.poster_image AS poster, shows.title AS title, shows.description AS description, shows.genres AS genres, shows.type AS type, shows.studios AS studios, shows.date_aired  AS dateAired, shows.status AS status, shows.duration as duration, shows.quality AS quality, COUNT(views.show_id) AS numOfViews FROM shows LEFT JOIN views ON shows.id = views.show_id WHERE shows.id = :id GROUP BY shows.id';
        $show = $this->getShows($queryString, $id);
        if ($show) {
            return $show;
        }

        return null;
    }

    public function followShow($show_id, $user_id)
    {
        $insert = $this->connection->prepare('INSERT INTO followings (show_id, user_id) VALUES (:show_id, :user_id)');

        try {
            $insert->execute([
                ':show_id' => $show_id,
                ':user_id' => $user_id,
            ]);
        } catch (\PDOException $e) {
            echo ShowsModel::ERROR_MESSAGE;
        }
    }

    public function isShowFollowed($show_id, $user_id)
    {
        $select = $this->connection->prepare('SELECT * FROM followings WHERE show_id = :show_id AND user_id = :user_id');

        try {
            $select->execute([
                ':show_id' => $show_id,
                ':user_id' => $user_id,
            ]);

            return $select->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo ShowsModel::ERROR_MESSAGE;
            return false;
        }
    }

    public function isViewed($showId, $userId)
    {
        $select = $this->connection->prepare('SELECT * FROM views WHERE show_id = :show_id AND user_id = :user_id');

        try {
            $select->execute([
                ':show_id' => $showId,
                ':user_id' => $userId,
            ]);

            $result = $select->fetchAll(\PDO::FETCH_ASSOC);
            if (count($result) > 0) {
                return true;
            }

            return false;
        } catch (\PDOException $e) {
            echo ShowsModel::ERROR_MESSAGE;
            return false;
        }
    }

    public function markAsViewed($showId, $userId)
    {
        $insert = $this->connection->prepare('INSERT INTO views (show_id, user_id) VALUES (:show_id, :user_id)');

        try {
            $insert->execute([
                ':show_id' => $showId,
                ':user_id' => $userId,
            ]);
        } catch (\PDOException $e) {
            echo ShowsModel::ERROR_MESSAGE;
            return false;
        }
    }

    public function getFollowings($userId)
    {
        $queryString = 'SELECT shows.id AS id, shows.title AS title, shows.genres AS genres, shows.poster_image AS poster, shows.type AS type, shows.num_of_episodes_avail AS numOfEpisodesAvail, shows.total_num_of_episodes AS totalEpisodes FROM shows JOIN followings ON shows.id = followings.show_id WHERE followings.user_id = :userId';

        $select = $this->connection->prepare($queryString);

        try {
            $select->execute([
                ':userId' => $userId,
            ]);

            return $select->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo ShowsModel::ERROR_MESSAGE;
            return false;
        }
    }

    public function getShowsByKeyword($keyword, $limit = null)
    {
        $queryString = "SELECT shows.id AS id, shows.poster_image AS poster, shows.thumbnail_image AS thumbnail, shows.title as title, shows.num_of_episodes_avail AS numOfEpisodesAvail, shows.total_num_of_episodes AS totalEpisodes, shows.genres AS genres, COUNT(views.show_id) AS numOfViews FROM shows LEFT JOIN views ON shows.id = views.show_id WHERE shows.title LIKE '%" . $keyword . "%' GROUP BY shows.id ORDER BY shows.id DESC";
        return $this->getShows($queryString, $limit);
    }
}
