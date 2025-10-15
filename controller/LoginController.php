<?php

class LoginController {

    public function index() {
        require 'public/views/login.php'; 
    }

    public function proses() {
        echo "<h1>Memproses login...</h1>";
    }
}