<?php
require __DIR__ . '/autoload.php';

$url = $_SERVER['REQUEST_URI'];
//echo $url; die;
    $controller = new App\Controllers\MainController();
$action = $_GET['action'] ?: 'Index';
try {
    $controller->action($action);
} catch (Exception $e) {
    echo 'Что-то не так с базой: ' . $e->getMessage();
}
