<?php
require_once 'config/database.php';
require_once 'helpers/helper.php';

$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';
$url = filter_var($url, FILTER_SANITIZE_URL);
$url_parts = explode('/', $url);

$controllerName = !empty($url_parts[0]) ? ucfirst(strtolower($url_parts[0])) . "controller" : "HomeController";
$controllerFile = 'controller/' . $controllerName . '.php';

$methodName = !empty($url_parts[1]) ? strtolower($url_parts[1]) : 'index';

$params = array_slice($url_parts, 2);

if (file_exists($controllerFile)) {
    require_once $controllerFile;

    if (class_exists($controllerName) && method_exists($controllerName, $methodName)) {
        $controller = new $controllerName; 
        call_user_func_array([$controller, $methodName], $params);
    } else {
        http_response_code(404);
        echo "<h1>Error 404 not found!</h1>";
    }
} else {
    http_response_code(404);
    echo "<h1>Error 404 not found!</h1>";
}