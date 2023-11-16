<?php

namespace controllers;

require_once './models/AuthModel.php';
require_once './models/GenresModel.php';

use models\AuthModel;
use models\GenresModel;

class AuthController
{
    const REDIRECT = 'Location: /';

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

    public function signUp()
    {
        if (isset($_POST['registerUser'])) {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $confirmPassword = trim($_POST['confirmPassword']);

            if (empty($username) || empty($email) || empty($password) || empty($confirmPassword) || $password !== $confirmPassword) {
                echo '<script>alert("One or more mandatory fields are missing.")</script>';
            } else {
                if (empty($this->authModel->isUserExist($email))) {
                    $this->authModel->createUser($username, $email, $password);
                    $user = $this->authModel->getUser($email, $password);
                    if (empty($user)) {
                        echo '<script>alert("Error in create user.")</script>';
                    } else {
                        $_SESSION['id'] = $user['id'];
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['email'] = $user['email'];
                        header(AuthController::REDIRECT);
                    }
                } else {
                    echo '<script>alert("User already exist.")</script>';
                }
            }
        }

        $genres = $this->genres;
        include_once './views/auth/signup.html.php';
    }

    public function signIn()
    {
        if (isset($_POST['getUser'])) {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (empty($email) || empty($password)) {
                echo '<script>alert("Email or password are missing.")</script>';
            } else {
                $user = $this->authModel->getUser($email, $password);
                if (empty($user)) {
                    echo '<script>alert("Email or Password may be incorrect.")</script>';
                    return;
                } else {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    header(AuthController::REDIRECT);
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
        header(AuthController::REDIRECT);
    }
}
