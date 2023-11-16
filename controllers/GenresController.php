<?php

namespace controllers;

require_once './models/ShowsModel.php';
require_once './models/GenresModel.php';

use models\ShowsModel;
use models\GenresModel;

class GenresController
{
    private $showsModel;
    private $genresModel;

    public function __construct()
    {
        $this->showsModel = ShowsModel::getInstance();
        $this->genresModel = GenresModel::getInstance();
    }

    public function index()
    {
        $genres = $this->genresModel->getAllGenres();

        $showsByGenre = isset($_GET['name']) ? $this->showsModel->getShowsByGenre($_GET['name']) : $this->showsModel->getRecentlyAddedShows();
        $forYouSection = $this->showsModel->getShowsByGenre('Adventure');

        include_once './views/genres.view.php';
    }
}
