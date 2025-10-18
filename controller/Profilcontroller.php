<?php
class Profilcontroller extends Controller {

    public function index() {
        if (!isset($_SESSION['user_id'])) {
            echo "<script>alert('Anda harus login terlebih dahulu!'); 
                  window.location.href = '" . BASEURL . "/login';</script>";
            exit; 
        }

        $userId = $_SESSION['user_id']; 

        $userModel = $this->model('User_model');
        $data['user'] = $userModel->getUserById($userId);

        if (!$data['user']) {
             echo "Error: Data user tidak ditemukan.";
             exit;
        }
        $data['judul'] = 'Profil Pengguna';

        $this->view('profil/index', $data);
    }
}
?>