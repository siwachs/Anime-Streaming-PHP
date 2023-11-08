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
        
        include_once './views/home.view.php';
    }
}
