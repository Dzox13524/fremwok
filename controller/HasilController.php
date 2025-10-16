<?php
require_once 'model/PendaftaranModel.php';

class HasilController {

    public function index() {
        $db = require 'config/database.php';

        $pendaftaranModel = new PendaftaranModel($db);

        $pendaftar = $pendaftaranModel->findAll();

        require 'public/views/hasil.php';
    }
}