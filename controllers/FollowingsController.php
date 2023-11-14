<?php

namespace controllers;

require_once './models/ShowsModel.php';
require_once './models/GenresModel.php';

use models\ShowsModel;
use models\GenresModel;

class FollowingsController
{
    private $showsModel;
    private $genres;

    public function __construct()
    {
        $this->showsModel = ShowsModel::getInstance();
        $this->genres = GenresModel::getInstance()->getAllGenres();
    }

    public function index()
    {
        $genres = $this->genres;
        $followings = $this->showsModel->getFollowings($_SESSION['id']);

        include_once './views/followings.view.php';
    }
}
