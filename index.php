<?php
require __DIR__ . '/autoload.php';

$url = $_SERVER['REQUEST_URI'];
$controller = new App\Controllers\Users();
$action = $_GET['action'] ?: 'Index';

try {
    $controller->action($action);
} catch (\App\Exceptions\Db $e) {
    echo 'Что-то не так с базой: ' . $e->getMessage();
}
