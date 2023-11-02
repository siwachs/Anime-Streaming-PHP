<?php

require_once './controllers/HomeController.php';

use controllers\HomeController;

$request_uri = $_SERVER['REQUEST_URI'];

$homeController = new HomeController();
$homeController->index();
