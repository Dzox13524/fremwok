<?php
class Controller {
    public function view($view, $data = []) {
        extract($data);
        require_once 'public/views/' . $view . '.php';
    }
    public function model($model) {
        require_once 'model/' . $model . '.php';
        return new $model;
    }
}