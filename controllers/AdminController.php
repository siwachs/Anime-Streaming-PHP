<?php

namespace controllers;

require_once './models/AdminModel.php';
require_once './models/GenresModel.php';

use models\AdminModel;
use models\GenresModel;

class AdminController
{
    const SHOWS_DIR = 'assets/showsEpisodes/';
    const THUMBNAIL_DIR = 'assets/showsImages/thumbnails/';
    const POSTER_DIR = 'assets/showsImages/posters/';
    const REDIRECT_ADMIN = 'Location: /admin';
    const REDIRECT_SHOWS = 'Location: /admin/shows';
    const REDIRECT_GENRES = 'Location: /admin/genres';
    const REDIRECT_EPISODES = 'Location: /admin/episodes';

    private static $instance;
    private $adminModel;
    private $genresModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->genresModel = GenresModel::getInstance();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function index()
    {
        $stats = $this->adminModel->getStats();

        include_once './views/admin/index.view.php';
    }

    public function signIn()
    {
        if (isset($_POST['getAdmin'])) {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (empty($email) || empty($password)) {
                echo '<script>alert("One or more mandatory fields are missing.")</script>';
            } else {
                $user = $this->adminModel->getAdmin($email, $password);
                if (empty($user)) {
                    echo '<script>alert("Email or Password may be incorrect.")</script>';
                } else {
                    $_SESSION['adminId'] = $user['id'];
                    $_SESSION['adminname'] = $user['adminname'];
                    $_SESSION['adminEmail'] = $user['email'];
                    header(AdminController::REDIRECT_ADMIN);
                }
            }
        }

        include_once './views/admin/signin.view.php';
    }

    public function signOut()
    {
        unset($_SESSION['adminId']);
        unset($_SESSION['adminname']);
        unset($_SESSION['adminEmail']);
        header(AdminController::REDIRECT_ADMIN);
    }

    public function adminList()
    {
        $admins = $this->adminModel->getAdmins();

        include_once './views/admin/admins.view.php';
    }

    public function createAdmin()
    {
        if (isset($_POST['createAdmin'])) {
            $adminname = trim($_POST['adminname']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (empty($email) || empty($password) || empty($adminname)) {
                echo '<script>alert("Adminname, Email or password are missing.")</script>';
            } else {
                $this->adminModel->createAdmin($adminname, $email, $password);
                header('Location: /admin/list');
            }
        }

        include_once './views/admin/create_admin.view.php';
    }

    public function showsList()
    {
        $shows = $this->adminModel->getShows();

        include_once './views/admin/shows.view.php';
    }

    private function makeDirectory($dir)
    {
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
    }

    public function createShow()
    {
        if (isset($_POST['createShow'])) {
            $title = trim($_POST['title'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $showType = trim($_POST['showType'] ?? '');
            $studios = trim($_POST['studios'] ?? '');
            $dateAired = trim($_POST['dateAired'] ?? '');
            $status = trim($_POST['status'] ?? '');
            $genresArray = $_POST['genresArray'] ?? [];
            $duration = trim($_POST['duration'] ?? '');
            $quality = trim($_POST['quality'] ?? '');
            $numOfAvailEpisodes = $_POST['numOfAvailEpisodes'];
            $numOfTotalEpisodes = $_POST['numOfTotalEpisodes'];

            // Processing uploaded files
            $thumbnail = $_FILES['thumbnail']['name'] ?? '';
            $poster = $_FILES['poster']['name'] ?? '';

            if (empty($title) || empty($description) || empty($showType) || empty($studios) || empty($dateAired) || empty($status) || empty($genresArray) || empty($duration) || empty($thumbnail) || empty($thumbnail) || empty($quality) || !is_numeric($numOfAvailEpisodes) || $numOfAvailEpisodes < 0 || !is_numeric($numOfTotalEpisodes) || $numOfTotalEpisodes < 0) {
                echo "<script>alert('Validation Failed. All fields are required.')</script>";
            } else {
                $this->makeDirectory(AdminController::THUMBNAIL_DIR);
                $this->makeDirectory(AdminController::POSTER_DIR);

                $transformedTitle = str_replace(' ', '_', $title);
                $thumbnailDir = AdminController::THUMBNAIL_DIR . $transformedTitle . '_' . basename($thumbnail);
                $posterDir = AdminController::POSTER_DIR . $transformedTitle . '_' . basename($poster);

                $showData = [
                    'title' => $title,
                    'thumbnail' => '/' . $thumbnailDir,
                    'poster' => '/' . $posterDir,
                    'description' => $description,
                    'showType' => $showType,
                    'studios' => $studios,
                    'dateAired' => $dateAired,
                    'status' => $status,
                    'genres' => implode(', ', $genresArray),
                    'duration' => $duration,
                    'quality' => $quality,
                    'numOfAvailEpisodes' => $numOfAvailEpisodes,
                    'numOfTotalEpisodes' => $numOfTotalEpisodes
                ];

                if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnailDir) && move_uploaded_file($_FILES['poster']['tmp_name'], $posterDir)) {
                    $this->adminModel->insertShow($showData);
                    header(AdminController::REDIRECT_SHOWS);
                }
            }
        }

        $genres = $this->genresModel->getAllGenres();

        include_once './views/admin/create_show.view.php';
    }

    public function deleteShow()
    {
        if (isset($_GET['id'])) {
            $showImages = $this->adminModel->getImagesLink($_GET['id']);

            if (empty($showImages)) {
                header(AdminController::REDIRECT_SHOWS);
            } else {
                unlink(substr($showImages['thumbanil'], 1));
                unlink(substr($showImages['poster'], 1));

                $this->adminModel->deleteShow($_GET['id']);
                header(AdminController::REDIRECT_SHOWS);
            }
        } else {
            header(AdminController::REDIRECT_SHOWS);
        }
    }

    public function genresList()
    {
        $genres = $this->genresModel->getAllGenres();

        include_once './views/admin/genres.view.php';
    }

    public function createGenre()
    {
        if (isset($_POST['createGenre'])) {
            $name = trim($_POST['name'] ?? '');

            if (empty($name)) {
                echo "<script>alert('Validation Failed. Name field are required.')</script>";
            } else {
                $this->adminModel->createGenre($name);
                header(AdminController::REDIRECT_GENRES);
            }
        }

        include_once './views/admin/create_genre.view.php';
    }

    public function deleteGenre()
    {
        if (isset($_GET['id'])) {
            $this->adminModel->deleteGenre($_GET['id']);
            header(AdminController::REDIRECT_GENRES);
        } else {
            header(AdminController::REDIRECT_GENRES);
        }
    }

    public function episodesList()
    {
        $episodes = $this->adminModel->getEpisodes();

        include_once './views/admin/episodes.view.php';
    }

    public function createEpisode()
    {
        if (isset($_POST['createEpisode'])) {
            $title = trim($_POST['title'] ?? '');
            $show = trim($_POST['show'] ?? '');

            // Processing uploaded files
            $thumbnail = $_FILES['thumbnail']['name'] ?? '';
            $video = $_FILES['video']['name'] ?? '';

            if (empty($title) || empty($show) || empty($thumbnail) || empty($video)) {
                echo "<script>alert('Validation Failed. All fields are required.')</script>";
            } else {
                $parsedShow = json_decode($show, true);
                $showId = $parsedShow["id"];
                $showTitle = $parsedShow["title"];

                if (!is_dir(AdminController::SHOWS_DIR)) {
                    mkdir(AdminController::SHOWS_DIR);
                }

                $transformedTitle = str_replace(" ", "_", $showTitle);
                $thumbnailDir = AdminController::SHOWS_DIR . $transformedTitle . '/thumbnails/';
                $videoDir = AdminController::SHOWS_DIR . $transformedTitle . '/episodes/';

                $this->makeDirectory($thumbnailDir);
                $this->makeDirectory($videoDir);

                if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnailDir . basename($thumbnail)) && move_uploaded_file($_FILES['video']['tmp_name'], $videoDir . basename($video))) {
                    $this->adminModel->insertEpisode($showId, '/' . $videoDir . basename($video), '/' . $thumbnailDir . basename($thumbnail), $title);
                    header(AdminController::REDIRECT_EPISODES);
                }
            }
        }

        $shows = $this->adminModel->getShowsForEpisodes();

        include_once './views/admin/create_episode.view.php';
    }

    public function deleteEpisode()
    {
        if (isset($_GET['id'])) {
            $episodeLinks = $this->adminModel->getEpisodeLink($_GET['id']);

            if (empty($episodeLinks)) {
                header(AdminController::REDIRECT_EPISODES);
            } else {
                unlink(substr($episodeLinks['video'], 1));
                unlink(substr($episodeLinks['thumbnail'], 1));

                $this->adminModel->deleteEpisode($_GET['id']);
                header(AdminController::REDIRECT_EPISODES);
            }
        } else {
            header(AdminController::REDIRECT_EPISODES);
        }
    }
}
