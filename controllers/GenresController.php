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
    private $genre;

    public function __construct($genre)
    {
        $this->showsModel = ShowsModel::getInstance();
        $this->genresModel = GenresModel::getInstance();
        $this->genre = $genre;
    }

    public function index()
    {
        $genres = $this->genresModel->getAllGenres();
        $genre = $this->genre;

        $showsByGenre = $genre === 'All' ? $this->showsModel->getRecentlyAddedShows() : $this->showsModel->getShowsByGenre($genre);
        $forYouSection = $this->showsModel->getShowsByGenre('Adventure');

        include_once './views/genres.view.php';
    }
}
