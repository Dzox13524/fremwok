<?php
require_once 'model/PendaftaranModel.php';

class RegisterController {

    public function index() {
        require 'public/views/register.php';
    }

    public function simpan() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /register');
            exit();
        }

        $namaFileFoto = null;
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $uploadDirFoto = 'uploads/fotos/';
            $namaFileFoto = uniqid() . '-' . basename($_FILES['foto']['name']);
            $targetPathFoto = $uploadDirFoto . $namaFileFoto;

            if (!is_dir($uploadDirFoto)) {
                mkdir($uploadDirFoto, 0777, true);
            }

            if (!move_uploaded_file($_FILES['foto']['tmp_name'], $targetPathFoto)) {
                header('Location: /register?error=foto_upload_failed');
                exit();
            }
        }

        $namaFileSignature = null;
        if (isset($_POST['signature']) && !empty($_POST['signature'])) {
            $signatureData = $_POST['signature'];
            
            $dataParts = explode(',', $signatureData);
            $decodedData = base64_decode($dataParts[1]);

            $uploadDirSignature = 'uploads/signatures/';
            $namaFileSignature = uniqid() . '-signature.png';
            $targetPathSignature = $uploadDirSignature . $namaFileSignature;
            
            if (!is_dir($uploadDirSignature)) {
                mkdir($uploadDirSignature, 0777, true);
            }

            file_put_contents($targetPathSignature, $decodedData);
        }
        
        $data = [
            'nama' => $_POST['nama'] ?? null,
            'umur' => $_POST['umur'] ?? null,
            'jurusan' => $_POST['jurusan'] ?? null,
            'provinsi' => $_POST['provinsi'] ?? null,
            'kota' => $_POST['kota'] ?? null,
            'alamat' => $_POST['alamat'] ?? null,
            'jenisKelamin' => $_POST['jenisKelamin'] ?? null,
            'foto_path' => $namaFileFoto,
            'signature_path' => $namaFileSignature,
        ];

        $db = require 'config/database.php';
        $pendaftaranModel = new PendaftaranModel($db);

        if ($pendaftaranModel->create($data)) {
            header('Location: /register/sukses');
            exit();
        } else {
            header('Location: /register?error=db_error');
            exit();
        }
    }

    public function sukses() {
        echo "<h1>Pendaftaran Anda Berhasil!</h1> <a href='/'>Kembali ke Home</a>";
    }
}