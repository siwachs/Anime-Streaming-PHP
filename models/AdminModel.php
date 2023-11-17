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
        $stats = [];

        try {
            $selectShowsCount = 'SELECT COUNT(*) AS showsCount FROM shows';
            $stmt = $this->connection->query($selectShowsCount);
            $showsCount = $stmt->fetchColumn();
            $stats['showsCount'] = $showsCount;

            $selectEpisodesCount = 'SELECT COUNT(*) AS episodesCount FROM episodes';
            $stmt = $this->connection->query($selectEpisodesCount);
            $episodesCount = $stmt->fetchColumn();
            $stats['episodesCount'] = $episodesCount;

            $selectGenresCount = 'SELECT COUNT(*) AS genresCount FROM genres';
            $stmt = $this->connection->query($selectGenresCount);
            $genresCount = $stmt->fetchColumn();
            $stats['genresCount'] = $genresCount;

            $selectAdminCount = 'SELECT COUNT(*) AS adminCount FROM admins';
            $stmt = $this->connection->query($selectAdminCount);
            $adminCount = $stmt->fetchColumn();
            $stats['adminCount'] = $adminCount;
            return $stats;
        } catch (\PDOException $e) {
            echo "There is a error in get stats.";
        }
    }

    public function getAdmins()
    {
        $select = $this->connection->prepare('SELECT admins.id AS id, admins.adminname AS adminname, admins.email AS email from admins ORDER BY created_at DESC');

        try {
            $select->execute();
            return $select->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "There is a error in get admin.";
        }
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

    public function createAdmin($adminname, $email, $password)
    {
        $insert = $this->connection->prepare('INSERT INTO admins(email, adminname, password) VALUES (:email, :adminname, :password)');

        try {
            $insert->execute([
                ':adminname' => $adminname,
                ':email' => $email,
                ':password' => password_hash($password, PASSWORD_DEFAULT)
            ]);
        } catch (\PDOException $e) {
            echo "There is a error in create admin.";
        }
    }

    public function getShows()
    {
        $select = $this->connection->prepare('SELECT shows.id AS id, shows.title AS title, shows.thumbnail_image AS thumbanil, shows.poster_image AS poster, shows.type AS type, shows.date_aired AS dateAired, shows.status AS status, shows.genres AS genres, shows.num_of_episodes_avail AS numOfEpisodesAvail, shows.total_num_of_episodes AS totalEpisodes, shows.created_at AS createdAt FROM shows');

        try {
            $select->execute();
            return $select->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "There is a error in get shows.";
        }
    }
}
