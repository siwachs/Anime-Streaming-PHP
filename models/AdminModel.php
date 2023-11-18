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
        $select = $this->connection->prepare('SELECT shows.id AS id, shows.title AS title, shows.thumbnail_image AS thumbanil, shows.poster_image AS poster, shows.type AS type, shows.date_aired AS dateAired, shows.status AS status, shows.genres AS genres, shows.num_of_episodes_avail AS numOfEpisodesAvail, shows.total_num_of_episodes AS totalEpisodes, shows.created_at AS createdAt FROM shows ORDER BY created_at DESC');

        try {
            $select->execute();
            return $select->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "There is a error in get shows.";
        }
    }

    public function insertShow($showData)
    {
        try {
            $insert = $this->connection->prepare('INSERT INTO shows(title, thumbnail_image, poster_image, description, type, studios, date_aired, status, genres, duration, quality,  num_of_episodes_avail, total_num_of_episodes) VALUES (:title, :thumbnail, :poster, :description, :showType, :studios, :dateAired, :status, :genres, :duration, :quality,  :numOfAvailEpisodes, :numOfTotalEpisodes)');

            $insert->bindParam(':title', $showData['title']);
            $insert->bindParam(':thumbnail', $showData['thumbnail']);
            $insert->bindParam(':poster', $showData['poster']);
            $insert->bindParam(':description', $showData['description']);
            $insert->bindParam(':showType', $showData['showType']);
            $insert->bindParam(':studios', $showData['studios']);
            $insert->bindParam(':dateAired', $showData['dateAired']);
            $insert->bindParam(':status', $showData['status']);
            $insert->bindParam(':genres', $showData['genres']);
            $insert->bindParam(':duration', $showData['duration']);
            $insert->bindParam(':quality', $showData['quality']);
            $insert->bindParam(':numOfAvailEpisodes', $showData['numOfAvailEpisodes']);
            $insert->bindParam(':numOfTotalEpisodes', $showData['numOfTotalEpisodes']);

            $insert->execute();
        } catch (\PDOException $e) {
            echo "There is an error in inserting the show.";
        }
    }

    public function getImagesLink($showId)
    {
        $select = $this->connection->prepare('SELECT shows.thumbnail_image AS thumbanil, shows.poster_image AS poster FROM shows WHERE id= :id');

        try {
            $select->execute([
                ':id' => $showId
            ]);
            return $select->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "There is a error in get shows.";
        }
    }

    public function deleteShow($showId)
    {
        $delete = $this->connection->prepare('DELETE FROM shows WHERE id= :id');

        try {
            $delete->execute([
                ':id' => $showId
            ]);
        } catch (\PDOException $e) {
            echo "There is a error in deleting a show.";
        }
    }

    public function createGenre($genre)
    {
        $insert = $this->connection->prepare("INSERT INTO genres (name) VALUES (:name)");

        try {
            $insert->execute([
                ':name' => $genre
            ]);
        } catch (\PDOException $e) {
            echo "There is a error in create genre.";
        }
    }

    public function deleteGenre($genreId)
    {
        $delete = $this->connection->prepare('DELETE FROM genres WHERE id= :id');

        try {
            $delete->execute([
                ':id' => $genreId
            ]);
        } catch (\PDOException $e) {
            echo "There is a error in deleting a genre.";
        }
    }
}
