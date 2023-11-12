<?php

namespace controllers;

require_once './models/ShowsModel.php';
require_once './models/GenresModel.php';

use models\ShowsModel;
use models\GenresModel;

class HomeController
{
    private $homeModel;
    private $genresModel;

    public function __construct()
    {
        $this->homeModel = new ShowsModel();
        $this->genresModel = new GenresModel();
    }

    public function index()
    {
        $genres = $this->genresModel->getAllGenres();

        $heroSection = $this->homeModel->getAllShows();
        $trendingShows = $this->homeModel->getTrendingShows();
        $adventureShows = $this->homeModel->getShowsByGenre('Adventure');
        $recentlyAddedShows = $this->homeModel->getRecentlyAddedShows();
        $liveActionShows = $this->homeModel->getShowsByGenre('Live');
        $forYouSection = $this->homeModel->getForYouShows('Adventure');

        include_once './views/home.view.php';
    }
}
