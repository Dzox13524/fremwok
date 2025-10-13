    <?php
    require_once 'model/model.php';

    class Controller {
        private $model;

        public function __construct() {
            $this->model = new Model();
        }

        public function jalankan() {
            // $data_untuk_view = $this->model->teks;
            // $data_dari_controller = $data_untuk_view;
            require 'views/index.php';
        }
    }