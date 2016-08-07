<?php
//var_dump($_GET);die;
require __DIR__ . '/autoload.php';

$url = $_SERVER['REQUEST_URI'];
//echo $url; die;
if (!$url == '/') {
    var_dump($url);
    $controller = new App\Controllers\Messages();
} else {
    $controller = new App\Controllers\Users();
}
$action = $_GET['action'] ?: 'Index';

try {
    $controller->action($action);
} catch (\App\Exceptions\Db $e) {
    echo 'Что-то не так с базой: ' . $e->getMessage();
}
