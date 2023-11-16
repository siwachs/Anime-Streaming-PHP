<?php

namespace models;

use Database;

require_once './Database.php';

class CommentsModel
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

    private function getComments($queryString, $showId = null, $epId = null, $limit = null)
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

        if (isset($epId)) {
            $select->bindParam(':epId', $epId, \PDO::PARAM_INT);
        }

        try {
            $select->execute();
            return $select->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo CommentsModel::ERROR_MESSAGE;
        }
    }

    public function getReviewsByShowId($showId)
    {
        $queryString = 'SELECT * FROM reviews WHERE show_id = :showId ORDER BY created_at DESC';
        return $this->getComments($queryString, $showId);
    }

    public function insertReview($showId, $userId, $comment, $username)
    {
        $queryString = 'INSERT INTO reviews (show_id, user_id, comment, username) VALUES (:showId, :userId, :comment, :username)';
        $insert = $this->connection->prepare($queryString);
        try {
            $insert->execute([
                ':showId' => $showId,
                'userId' => $userId,
                ':comment' => $comment,
                ':username' => $username
            ]);
        } catch (\Exception $e) {
            echo CommentsModel::ERROR_MESSAGE;
        }
    }

    public function getEpisodesComment($showId, $epId)
    {
        $queryString = 'SELECT * FROM comments WHERE show_id = :showId AND ep_id = :epId ORDER BY created_at DESC';
        return $this->getComments($queryString, $showId, $epId);
    }

    public function insertComment($showId, $userId, $epId, $comment, $username)
    {
        $queryString = 'INSERT INTO comments (show_id, ep_id, user_id, username, comment) VALUES (:showId, :epId , :userId, :username, :comment)';
        $insert = $this->connection->prepare($queryString);
        try {
            $insert->execute([
                ':showId' => $showId,
                'userId' => $userId,
                ':comment' => $comment,
                ':username' => $username,
                ':epId' => $epId,
            ]);
        } catch (\Exception $e) {
            echo CommentsModel::ERROR_MESSAGE;
        }
    }
}
