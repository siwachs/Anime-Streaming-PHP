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

        $show = $this->showsModel->getShowById($_GET['id']);

        if (isset($show)) {
            $youMightLike = $this->showsModel->getShowsByGenre($show[0]['genres']);
            $comments = $this->commentsModel->getCommentsByShowId($_GET['id']);

            include_once './views/anime_details.view.php';
        }
    }
}
