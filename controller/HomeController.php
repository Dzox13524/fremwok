<?php
class Homecontroller extends Controller {
    
    public function index() {
        $this->view('index'); 
    }
    
    public function about() {
        echo "<h1>Ini adalah Halaman About</h1>";
    }
}