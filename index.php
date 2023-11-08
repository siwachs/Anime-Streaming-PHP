<?php

require_once './Database.php';
require_once './controllers/HomeController.php';
require_once './controllers/CategoriesController.php';
require_once './controllers/AuthController.php';
require_once './controllers/AnimeDetailsController.php';

use controllers\HomeController;
use controllers\CategoriesController;
use controllers\AuthController;
use controllers\AnimeDetailsController;

$request_uri = $_SERVER['REQUEST_URI'];
session_start();
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
        $authController = AuthController::getInstance();
        if (isset($_SESSION['email'])) {
            $authController->redirectTo('/');
        } else {
            $authController->signUp();
        }
        break;
    case '/auth/signin':
        $authController = AuthController::getInstance();
        if (isset($_SESSION['email'])) {
            $authController->redirectTo('/');
        } else {
            $authController->signIn();
        }
        break;
    case '/auth/signout':
        $authController = AuthController::getInstance();
        $authController->signOut();
        break;
    case '/anime-details':
        $animeDetailsController = new AnimeDetailsController();
        $animeDetailsController->index();
        break;
    default:
        echo 'Page not found.';
}
