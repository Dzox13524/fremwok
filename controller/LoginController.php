<?php
require_once 'model/UserModel.php';

class LoginController {
    public function index() {
        session_start();
        if (isset($_SESSION['user_id'])) {
            header('Location: /dashboard');
            exit();
        }
        require 'public/views/login.php';
    }

    public function proses() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $db = require 'config/database.php';
            $userModel = new UserModel($db);

            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $userModel->findByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: /dashboard');
                exit();
            } else {
                header('Location: /login?error=1');
                exit();
            }
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /login');
        exit();
    }
}