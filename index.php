<?php

require_once './Database.php';
require_once './controllers/HomeController.php';
require_once './controllers/GenresController.php';
require_once './controllers/AuthController.php';
require_once './controllers/AnimeDetailsController.php';
require_once './controllers/AnimeWatchingController.php';

use controllers\HomeController;
use controllers\GenresController;
use controllers\AuthController;
use controllers\AnimeDetailsController;
use controllers\AnimeWatchingController;

$request_uri = $_SERVER['REQUEST_URI'];
session_start();
Database::getInstance()->getConnection();

$parsed_url = parse_url($request_uri);
$path = $parsed_url['path'];

switch ($path) {
    case '/':
        $homeController = new HomeController();
        $homeController->index();
        break;
    case '/genres':
        $genresController = new GenresController(isset($_GET['name']) ? $_GET['name'] : 'All');
        $genresController->index();
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
    case '/anime-watching':
        $animeWatchingController = new AnimeWatchingController();
        $animeWatchingController->index();
        break;
    default:
        echo 'Page not found.';
}
