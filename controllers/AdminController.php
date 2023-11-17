<?php

namespace controllers;

require_once './models/AdminModel.php';
require_once './models/GenresModel.php';

use models\AdminModel;
use models\GenresModel;

class AdminController
{
    const REDIRECT = 'Location: /admin';

    private static $instance;
    private $adminModel;
    private $genresModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->genresModel = GenresModel::getInstance();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function index()
    {
        $stats = $this->adminModel->getStats();

        include_once './views/admin/index.view.php';
    }

    public function signIn()
    {
        if (isset($_POST['getAdmin'])) {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (empty($email) || empty($password)) {
                echo '<script>alert("One or more mandatory fields are missing.")</script>';
            } else {
                $user = $this->adminModel->getAdmin($email, $password);
                if (empty($user)) {
                    echo '<script>alert("Email or Password may be incorrect.")</script>';
                } else {
                    $_SESSION['adminId'] = $user['id'];
                    $_SESSION['adminname'] = $user['adminname'];
                    $_SESSION['adminEmail'] = $user['email'];
                    header(AdminController::REDIRECT);
                }
            }
        }

        include_once './views/admin/signin.view.php';
    }

    public function signOut()
    {
        unset($_SESSION['adminId']);
        unset($_SESSION['adminname']);
        unset($_SESSION['adminEmail']);
        header(AdminController::REDIRECT);
    }

    public function adminList()
    {
        $admins = $this->adminModel->getAdmins();

        include_once './views/admin/admins.view.php';
    }

    public function createAdmin()
    {
        if (isset($_POST['createAdmin'])) {
            $adminname = trim($_POST['adminname']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (empty($email) || empty($password) || empty($adminname)) {
                echo '<script>alert("Adminname, Email or password are missing.")</script>';
            } else {
                $this->adminModel->createAdmin($adminname, $email, $password);
                header('Location: /admin/list');
            }
        }

        include_once './views/admin/create_admin.view.php';
    }

    public function showsList()
    {
        $shows = $this->adminModel->getShows();

        include_once './views/admin/shows.view.php';
    }

    public function createShow()
    {
        $genres = $this->genresModel->getAllGenres();

        include_once './views/admin/create_show.view.php';
    }
}
