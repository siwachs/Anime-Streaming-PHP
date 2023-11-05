<?php

namespace controllers;

require_once './models/AuthModel.php';

use models\AuthModel;

class AuthController
{
    public function signUp()
    {
        if (isset($_POST['submit'])) {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $confirm_password = trim($_POST['confirm_password']);

            if (empty($username) || empty($email) || empty($password) || empty($confirm_password) || $password !== $confirm_password) {
                echo '<script>alert("Validation Error.")</script>';
                return;
            }
        }

        include_once './views/auth/signup.html.php';
    }
}
