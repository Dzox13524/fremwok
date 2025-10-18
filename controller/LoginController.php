<?php

class Logincontroller extends Controller {

    public function index() {
        if (isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/profil'); 
            exit;
        }
        $data['judul'] = 'Login Pendaftar';
        $this->view('login', $data); 
    }

    public function auth() {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        $nama = $_POST['nama']; 
        $passwordInput = $_POST['password'];

        $pendaftarModel = $this->model('Pendaftar_model');
        $pendaftar = $pendaftarModel->getPendaftarByNama($nama);

        if ($pendaftar) {
            echo "Password Input: "; var_dump($passwordInput);
        echo "Hash dari DB: "; var_dump($pendaftar['password']);
        echo "Hasil Verify: "; var_dump(password_verify($passwordInput, $pendaftar['password']));
            if (password_verify($passwordInput, $pendaftar['password'])) {
                $_SESSION['user_id'] = $pendaftar['id'];
                $_SESSION['nama'] = $pendaftar['nama'];
                $_SESSION['user_role'] = 'user';

                session_regenerate_id(true); 

                header('Location: ' . BASEURL . '/profil'); 
                exit;

            } else {
                echo "<script>alert('Password salah!'); 
                      window.location.href = '" . BASEURL . "/login';</script>";
                exit;
            }
        } else {
             echo "<script>alert('Nama tidak ditemukan!'); 
                   window.location.href = '" . BASEURL . "/login';</script>";
            exit;
        }
    }

    public function logout() {
        $_SESSION = array(); 
        session_unset();
        session_destroy();
        header('Location: ' . BASEURL . '/login');
        exit;
    }
}