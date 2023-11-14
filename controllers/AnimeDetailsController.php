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

    private function timeAgo($timestamp)
    {
        return $timestamp;
    }

    public function index()
    {
        $genres = $this->genres;
        $show = $this->showsModel->getShowById($_GET['id']);

        if (isset($show)) {
            $youMightLike = $this->showsModel->getShowsByGenre($show[0]['genres']);
            $comments = $this->commentsModel->getReviewsByShowId($_GET['id']);

            foreach ($comments as &$comment) {
                $comment['created_at'] = $this->timeAgo($comment['created_at']);
            }

            if (isset($_POST['submit']) && isset($_SESSION['email'])) {
                $this->showsModel->followShow($_GET['id'], $_SESSION['id']);
                header("Location: /anime-details?id=" . $_GET['id']);
            }

            if (isset($_POST['submit_comment']) && isset($_SESSION['email']) && isset($_POST['comment'])) {
                $this->commentsModel->insertReview($_GET['id'], $_SESSION['id'], $_POST['comment'], $_SESSION['username']);
                header("Location: /anime-details?id=" . $_GET['id']);
            }

            $isFollowed = $this->showsModel->isShowFollowed($_GET['id'], $_SESSION['id']);

            include_once './views/anime_details.view.php';
        }
    }
}
