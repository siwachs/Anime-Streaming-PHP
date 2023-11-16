<?php

namespace controllers;

require_once './models/EpisodesModel.php';
require_once './models/ShowsModel.php';
require_once './models/CommentsModel.php';
require_once './models/GenresModel.php';

use models\EpisodesModel;
use models\ShowsModel;
use models\CommentsModel;
use models\GenresModel;

class AnimeWatchingController
{
    private $episodesModel;
    private $showsModel;
    private $commentsModel;
    private $genres;

    public function __construct()
    {
        $this->episodesModel = EpisodesModel::getInstance();
        $this->showsModel = ShowsModel::getInstance();
        $this->commentsModel = CommentsModel::getInstance();
        $this->genres = GenresModel::getInstance()->getAllGenres();
    }

    public function index()
    {
        $genres = $this->genres;
        if (isset($_GET['id']) && isset($_GET['ep'])) {
            $episodeArray = $this->episodesModel->getEpisodeById($_GET['id'], $_GET['ep']);
        }

        if (empty($episodeArray)) {
            include_once './views/404.view.php';
            return;
        }
        $episode = $episodeArray[0];

        $episodesList =  $this->episodesModel->getEpisodesById($_GET['id']);
        $comments = $this->commentsModel->getEpisodesComment($_GET['id'], $_GET['ep']);

        if (isset($_SESSION['id']) && isset($_POST['submitComment']) && isset($_POST['comment'])) {
            $this->commentsModel->insertComment($_GET['id'], $_SESSION['id'], $_GET['ep'], $_POST['comment'], $_SESSION['username']);
            header('Location: /anime-watching?id=' . $_GET['id'] . '&ep=' . $_GET['ep']);
        }

        include_once './views/client/anime_watching.view.php';
    }
}
