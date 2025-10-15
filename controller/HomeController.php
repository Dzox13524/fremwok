<?php

class HomeController {
    
    public function index() {
        require_once 'public/views/index.php';
    }
    public function about() {
        echo "<h1>Ini adalah Halaman About</h1>";
    }
}