<?php

namespace controllers;

require_once './models/AdminModel.php';

use models\AdminModel;

class AdminController
{
    const REDIRECT = 'Location: /admin';

    private static $instance;
    private $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
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
        include_once './views/admin/admins.view.php';
    }
}
