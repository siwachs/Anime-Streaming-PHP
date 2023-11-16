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

    public function index($popularShowsKeyword, $forYouSectionKeyword)
    {
        $genres = $this->genres;

        $heroSection = $this->showsModel->getAllShows(6);
        $trendingShows = $this->showsModel->getTrendingShows(6);
        $popularShows = $this->showsModel->getShowsByGenre($popularShowsKeyword);
        $recentlyAddedShows = $this->showsModel->getRecentlyAddedShows(6);
        $liveActionShows = $this->showsModel->getShowsByGenre('Live');
        $forYouSection = $this->showsModel->getShowsByGenre($forYouSectionKeyword);

        include_once './views/client/index.view.php';
    }
}
