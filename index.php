<?php
require __DIR__ . '/autoload.php';

$url = $_SERVER['REQUEST_URI'];
    $controller = new App\Controllers\MainController();
$action = isset($_GET['action']) ? $_GET['action'] : 'Index';
try {
    $controller->action($action);
} catch (\Exception $e) {
    echo $e->getMessage();
}
