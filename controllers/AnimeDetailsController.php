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


    private function timeAgo($time)
    {
        $time = strtotime($time);
        $time_difference = time() - $time;

        if ($time_difference < 1) {
            return 'less than 1 second ago';
        }

        $condition = array(
            12 * 30 * 24 * 60 * 60 =>  'year',
            30 * 24 * 60 * 60       =>  'month',
            24 * 60 * 60            =>  'day',
            60 * 60                 =>  'hour',
            60                      =>  'minute',
            1                       =>  'second'
        );

        foreach ($condition as $secs => $str) {
            $d = $time_difference / $secs;

            if ($d >= 1) {
                $t = round($d);
                return 'about ' . $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
            }
        }
    }

    public function index()
    {
        $genres = $this->genres;
        $showArray = $this->showsModel->getShowById($_GET['id']);

        if (empty($showArray)) {
            include_once './views/404.view.php';
            return;
        }

        if (isset($_SESSION['id']) && isset($_POST['followShow']) && isset($_POST['showId']) && isset($_POST['userId'])) {
            $this->showsModel->followShow($_GET['id'], $_SESSION['id']);
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

        foreach ($comments as &$comment) {
            $comment['created_at'] = $this->timeAgo($comment['created_at']);
        }

        include_once './views/anime_details.view.php';
    }
}
