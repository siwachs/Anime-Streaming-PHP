<?php

require_once './Database.php';
require_once './controllers/HomeController.php';
require_once './controllers/CategoriesController.php';
require_once './controllers/AuthController.php';

use controllers\HomeController;
use controllers\CategoriesController;
use controllers\AuthController;

$request_uri = $_SERVER['REQUEST_URI'];
Database::getInstance()->getConnection();

switch ($request_uri) {
    case '/':
        $homeController = new HomeController();
        $homeController->index();
        break;
    case '/categories':
        $categoriesController = new CategoriesController();
        $categoriesController->index();
        break;
    case '/auth/signup':
        $authController = new AuthController();
        $authController->signUp();
        break;
    default:
        echo 'Page not found.';
}
