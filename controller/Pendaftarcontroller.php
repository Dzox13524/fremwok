<?php
class Pendaftarcontroller extends Controller {
    
    public function index() {
        $data['judul'] = 'Formulir Pendaftaran';
        $this->view('register', $data); 
    }

    public function registeraksi() {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            header('Location: ' . BASEURL . '/pendaftar');
            exit;
        }

        $namaFoto = $this->uploadFoto();
        if ($namaFoto === false) {
            echo "<script>alert('Upload foto gagal!'); window.history.back();</script>";
            return;
        }

        $namaTandaTangan = $this->uploadTandaTangan($_POST['signature']);
        if ($namaTandaTangan === false) {
            echo "<script>alert('Tanda tangan gagal disimpan!'); window.history.back();</script>";
            return;
        }
        $data = $_POST;
        $data['foto'] = $namaFoto;
        $data['tanda_tangan'] = $namaTandaTangan;
        $data['jenis_kelamin'] = $_POST['jenisKelamin']; 

        $pendaftarModel = $this->model('Pendaftar_model');
        
        if ($pendaftarModel->tambahDataPendaftar($data) > 0) {
            
            echo "<script>alert('Registrasi Berhasil!'); 
                  window.location.href = '" . BASEURL . "/pendaftar/hasil';</script>";
            exit;

        } else {
            echo "<script>alert('Registrasi Gagal!'); window.history.back();</script>";
            exit;
        }
    }

    public function hasil() {
        $data['judul'] = 'Hasil Registrasi';
        
        $pendaftarModel = $this->model('Pendaftar_model');
        $data['pendaftar'] = $pendaftarModel->getAllPendaftar();
        
        $this->view('hasil', $data); 
    }
    private function uploadFoto() {
        if (!isset($_FILES['foto']) || $_FILES['foto']['error'] != UPLOAD_ERR_OK) return false;
        $file = $_FILES['foto'];
        $ekstensi = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $namaFileBaru = 'foto_' . uniqid() . '.' . $ekstensi;
        $tujuanUpload = 'public/uploads/foto/' . $namaFileBaru;
        if (move_uploaded_file($file['tmp_name'], $tujuanUpload)) {
            return $namaFileBaru;
        }
        return false;
    }

    private function uploadTandaTangan($dataBase64) {
        if (empty($dataBase64) || strpos($dataBase64, 'data:image/png;base64,') === false) return false;
        $data = str_replace('data:image/png;base64,', '', $dataBase64);
        $data = base64_decode($data);
        $namaFileBaru = 'ttd_' . uniqid() . '.png';
        $tujuanUpload = 'public/uploads/ttd/' . $namaFileBaru;
        if (file_put_contents($tujuanUpload, $data)) {
            return $namaFileBaru;
        }
        return false;
    }
}