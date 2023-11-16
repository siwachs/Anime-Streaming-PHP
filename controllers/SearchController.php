<?php

namespace controllers;

require_once './models/ShowsModel.php';
require_once './models/GenresModel.php';

use models\ShowsModel;
use models\GenresModel;

class SearchController
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

        if (isset($_POST['submitKeyword']) && isset($_POST['keyword']) && !empty($_POST['keyword'])) {
            $result = $this->showsModel->getShowsByKeyword($_POST['keyword']);

            include_once './views/search.view.php';
        } else {
            header('Location: /');
        }
    }
}
