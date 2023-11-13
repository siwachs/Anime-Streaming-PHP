<?php

namespace controllers;

require_once './models/AuthModel.php';
require_once './models/GenresModel.php';

use models\AuthModel;
use models\GenresModel;

class AuthController
{
    private static $instance;
    private $authModel;
    private $genres;

    public function __construct()
    {
        $this->authModel = new AuthModel();
        $this->genres = GenresModel::getInstance()->getAllGenres();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function redirectTo($path)
    {
        header("Location: " . $path);
    }

    public function signUp()
    {
        if (isset($_POST['submit'])) {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $confirmPassword = trim($_POST['confirm_password']);

            if (empty($username) || empty($email) || empty($password) || empty($confirmPassword) || $password !== $confirmPassword) {
                echo '<script>alert("Validation Error.")</script>';
            } else {
                $this->authModel->setAll($username, $email, $password);
                $this->authModel->createUser();
                $this->redirectTo('/auth/signin');
            }
        }

        $genres = $this->genres;

        include_once './views/auth/signup.html.php';
    }

    public function signIn()
    {
        if (isset($_POST['submit'])) {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (empty($email) || empty($password)) {
                echo '<script>alert("Email or password are missing.")</script>';
            } else {
                $user = $this->authModel->getUser($email, $password);

                if (!$user) {
                    echo '<script>alert("Email or Password may be incorrect.")</script>';
                } else {
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    $this->redirectTo('/');
                }
            }
        }

        $genres = $this->genres;

        include_once './views/auth/signin.html.php';
    }

    public function signOut()
    {
        session_unset();
        session_destroy();
        $this->redirectTo('/');
    }
}
