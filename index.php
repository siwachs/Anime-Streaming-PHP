<?php

require_once './Database.php';
require_once './controllers/HomeController.php';
require_once './controllers/GenresController.php';
require_once './controllers/AuthController.php';
require_once './controllers/AnimeDetailsController.php';
require_once './controllers/AnimeWatchingController.php';
require_once './controllers/FollowingsController.php';
require_once './controllers/SearchController.php';

use controllers\HomeController;
use controllers\GenresController;
use controllers\AuthController;
use controllers\AnimeDetailsController;
use controllers\AnimeWatchingController;
use controllers\FollowingsController;
use controllers\SearchController;

$request_uri = $_SERVER['REQUEST_URI'];
$parsed_url = parse_url($request_uri);
$path = $parsed_url['path'];

session_start();
$serverTimeZone = date_default_timezone_get();
date_default_timezone_set($serverTimeZone);
Database::getInstance()->getConnection();

switch ($path) {
    case '/':
        $homeController = new HomeController();
        $homeController->index('Adventure', 'comedy');
        break;
    case '/genres':
        $genresController = new GenresController(isset($_GET['name']) ? $_GET['name'] : 'All');
        $genresController->index();
        break;
    case '/auth/signup':
        $authController = AuthController::getInstance();
        if (isset($_SESSION['id'])) {
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
    case '/user/followings':
        $followingsController = new FollowingsController();
        $followingsController->index();
        break;
    case '/search':
        $searchController = new SearchController();
        $searchController->index();
        break;
    default:
        include_once './views/404.view.php';
}
