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
Database::getInstance()->getConnection();

function isAuthenticated()
{
    if (isset($_SESSION['id'])) {
        header('Location: /');
    }
}

function isAdminAuthenticated()
{
    global $path;
    if (!isset($_SESSION['adminId'])) {
        header('Location: /admin/signin');
    } elseif ($path === '/admin/signin') {
        header('Location: /admin');
    }
}

switch ($path) {
    case '/':
        $homeController = new HomeController();
        $homeController->index('Adventure', 'comedy'); # Popular, ForYou
        break;
    case '/genres':
        $genresController = new GenresController();
        $genresController->index();
        break;
    case '/auth/signup':
        isAuthenticated();
        AuthController::getInstance()->signUp();
        break;
    case '/auth/signin':
        isAuthenticated();
        AuthController::getInstance()->signIn();
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
        isAdminAuthenticated();
        AdminController::getInstance()->index();
        break;
    case '/admin/signin':
        isAdminAuthenticated();
        AdminController::getInstance()->signIn();
        break;
    case '/admin/signout':
        AdminController::getInstance()->signOut();
        break;
    case '/admin/list':
        isAdminAuthenticated();
        AdminController::getInstance()->adminList();
        break;
    case '/admin/create-admin':
        isAdminAuthenticated();
        AdminController::getInstance()->createAdmin();
        break;
    case '/admin/shows':
        isAdminAuthenticated();
        AdminController::getInstance()->showsList();
        break;
    case '/admin/create-show':
        isAdminAuthenticated();
        AdminController::getInstance()->createShow();
        break;
    case '/admin/delete/show':
        isAdminAuthenticated();
        AdminController::getInstance()->deleteShow();
        break;
    case '/admin/genres':
        isAdminAuthenticated();
        AdminController::getInstance()->genresList();
        break;
    case '/admin/create-genre':
        isAdminAuthenticated();
        AdminController::getInstance()->createGenre();
        break;
    case '/admin/delete/genre':
        isAdminAuthenticated();
        AdminController::getInstance()->deleteGenre();
        break;
    case '/admin/episodes':
        isAdminAuthenticated();
        AdminController::getInstance()->episodesList();
        break;
    case '/admin/create-episode':
        isAdminAuthenticated();
        AdminController::getInstance()->createEpisode();
        break;
    case '/admin/delete/episode':
        isAdminAuthenticated();
        AdminController::getInstance()->deleteEpisode();
        break;
    default:
        include_once './views/404.view.php';
}
