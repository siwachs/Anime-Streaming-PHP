<?php

namespace controllers;

require_once './models/EpisodesModel.php';
require_once './models/ShowsModel.php';
require_once './models/CommentsModel.php';

use models\EpisodesModel;
use models\ShowsModel;
use models\CommentsModel;

class AnimeWatchingController
{
    private $episodesModel;
    private $showsModel;
    private $commentsModel;

    public function __construct()
    {
        $this->episodesModel = EpisodesModel::getInstance();
        $this->showsModel = ShowsModel::getInstance();
        $this->commentsModel = CommentsModel::getInstance();
    }

    public function index()
    {
        $episode = $this->episodesModel->getEpisode($_GET['id'], $_GET['ep']);
        $episodesList =  $this->episodesModel->getEpisodes($_GET['id']);

        $show = $this->showsModel->getShowById($_GET['id']);
        $comments = $this->commentsModel->getEpisodesComment($_GET['id'], $_GET['ep']);

        if (isset($_POST['ep_comment']) && isset($_SESSION['email']) && isset($_POST['comment'])) {
            $this->commentsModel->insertComment($_GET['id'], $_SESSION['id'], $_GET['ep'], $_POST['comment'], $_SESSION['username']);
            header("Location: /anime-watching?id=" . $_GET['id'] . "&ep=" . $_GET['ep']);
        }

        include_once './views/anime_watching.view.php';
    }
}
