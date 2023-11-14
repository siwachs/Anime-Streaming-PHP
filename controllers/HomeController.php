<?php

namespace controllers;

require_once './models/ShowsModel.php';
require_once './models/GenresModel.php';

use models\ShowsModel;
use models\GenresModel;

class HomeController
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

        $heroSection = $this->showsModel->getAllShows();
        $trendingShows = $this->showsModel->getTrendingShows();
        $adventureShows = $this->showsModel->getShowsByGenre('adv');
        $recentlyAddedShows = $this->showsModel->getRecentlyAddedShows();
        $liveActionShows = $this->showsModel->getShowsByGenre('Live');
        $forYouSection = $this->showsModel->getShowsByGenre('Adventure');

        include_once './views/home.view.php';
    }
}
