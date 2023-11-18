<?php

require_once './Database.php';
require_once './controllers/HomeController.php';
require_once './controllers/GenresController.php';
require_once './controllers/AuthController.php';
require_once './controllers/AnimeDetailsController.php';
require_once './controllers/AnimeWatchingController.php';
require_once './controllers/FollowingsController.php';
require_once './controllers/SearchController.php';
require_once './controllers/AdminController.php';

use controllers\HomeController;
use controllers\GenresController;
use controllers\AuthController;
use controllers\AnimeDetailsController;
use controllers\AnimeWatchingController;
use controllers\FollowingsController;
use controllers\SearchController;
use controllers\AdminController;

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
        $genresController = new GenresController();
        $genresController->index();
        break;
    case '/auth/signup':
        if (isset($_SESSION['id'])) {
            header('Location: /');
        } else {
            AuthController::getInstance()->signUp();
        }
        break;
    case '/auth/signin':
        if (isset($_SESSION['id'])) {
            header('Location: /');
        } else {
            AuthController::getInstance()->signIn();
        }
        break;
    case '/auth/signout':
        AuthController::getInstance()->signOut();
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
    case '/admin':
        if (!isset($_SESSION['adminId'])) {
            header('Location: /admin/signin');
        } else {
            AdminController::getInstance()->index();
        }
        break;
    case '/admin/signin':
        if (isset($_SESSION['adminId'])) {
            header('Location: /admin');
        } else {
            AdminController::getInstance()->signIn();
        }
        break;
    case '/admin/signout':
        AdminController::getInstance()->signOut();
        break;
    case '/admin/list':
        if (!isset($_SESSION['adminId'])) {
            header('Location: /admin/signin');
        } else {
            AdminController::getInstance()->adminList();
        }
        break;
    case '/admin/create-admin':
        if (!isset($_SESSION['adminId'])) {
            header('Location: /admin/signin');
        } else {
            AdminController::getInstance()->createAdmin();
        }
        break;
    case '/admin/shows':
        if (!isset($_SESSION['adminId'])) {
            header('Location: /admin/signin');
        } else {
            AdminController::getInstance()->showsList();
        }
        break;
    case '/admin/create-show':
        if (!isset($_SESSION['adminId'])) {
            header('Location: /admin/signin');
        } else {
            AdminController::getInstance()->createShow();
        }
        break;
    case '/admin/delete/show':
        if (!isset($_SESSION['adminId'])) {
            header('Location: /admin/signin');
        } else {
            AdminController::getInstance()->deleteShow();
        }
        break;
    case '/admin/genres':
        if (!isset($_SESSION['adminId'])) {
            header('Location: /admin/signin');
        } else {
            AdminController::getInstance()->genresList();
        }
        break;
    case '/admin/create-genre':
        if (!isset($_SESSION['adminId'])) {
            header('Location: /admin/signin');
        } else {
            AdminController::getInstance()->createGenre();
        }
        break;
    case '/admin/delete/genre':
        if (!isset($_SESSION['adminId'])) {
            header('Location: /admin/signin');
        } else {
            AdminController::getInstance()->deleteGenre();
        }
        break;
    default:
        include_once './views/client/404.view.php';
}
