<?php

namespace controllers;

require_once './models/ShowsModel.php';
require_once './models/GenresModel.php';
require_once './models/CommentsModel.php';

use models\ShowsModel;
use models\GenresModel;
use models\CommentsModel;

class AnimeDetailsController
{
    private $showsModel;
    private $commentsModel;
    private $genres;

    public function __construct()
    {
        $this->showsModel = ShowsModel::getInstance();
        $this->genres = GenresModel::getInstance()->getAllGenres();
        $this->commentsModel = CommentsModel::getInstance();
    }

    public function index()
    {
        $genres = $this->genres;

        if (isset($_GET['id'])) {
            $showArray = $this->showsModel->getShowById($_GET['id']);
        }

        if (empty($showArray)) {
            include_once './views/404.view.php';
            return;
        }

        if (isset($_SESSION['id']) && isset($_POST['followShow']) && isset($_POST['showId']) && isset($_POST['userId'])) {
            $this->showsModel->followShow($_GET['id'], $_SESSION['id']);
            header('Location: /anime-details?id=' . $_GET['id']);
        }

        if (isset($_SESSION['id']) && isset($_POST['submitComment']) && isset($_POST['comment'])) {
            $this->commentsModel->insertReview($_GET['id'], $_SESSION['id'], $_POST['comment'], $_SESSION['username']);
            header('Location: /anime-details?id=' . $_GET['id']);
        }

        $show = $showArray[0];
        $youMightLike = $this->showsModel->getShowsByGenre($show['genres']);
        $comments = $this->commentsModel->getReviewsByShowId($_GET['id']);
        $isFollowed = isset($_SESSION['id']) ? count($this->showsModel->isShowFollowed($_GET['id'], $_SESSION['id'])) > 0 : false;
        $isViewed = isset($_SESSION['id']) ? count($this->showsModel->isViewed($_GET['id'], $_SESSION['id'])) > 0 : false;

        if (isset($_SESSION['id']) && !$isViewed) {
            $this->showsModel->markAsViewed($_GET['id'], $_SESSION['id']);
        }

        include_once './views/client/anime_details.view.php';
    }
}
