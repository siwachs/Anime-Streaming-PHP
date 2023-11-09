<?php

namespace controllers;

require_once './models/ShowsModel.php';

use models\ShowsModel;

class HomeController
{
    private $homeModel;

    public function __construct()
    {
        $this->homeModel = new ShowsModel();
    }

    public function index()
    {
        $heroSection = $this->homeModel->getAllShows();
        $trendingShows = $this->homeModel->getTrendingShows();
        $adventureShows = $this->homeModel->getShowsByGenre('Adventure');
        $recentlyAddedShows = $this->homeModel->getRecentlyAddedShows();
        $liveActionShows = $this->homeModel->getShowsByGenre('Live Action');
        $forYouSection = $this->homeModel->getForYouShows('Adventure');

        include_once './views/home.view.php';
    }
}
