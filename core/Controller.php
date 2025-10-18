<?php
class Controller {
    public function view($view, $data = []) {
        extract($data);
        require_once 'view/' . $view . '.php';
    }
    public function model($model) {
        require_once 'model/' . $model . '.php';
        return new $model;
    }
}