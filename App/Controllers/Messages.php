<?php
namespace App\Controllers;

use App\Exceptions\Core;
use App\View;

class Messages {

    protected $view;

    public function __construct() {
        $this->view = new View();

    }

    public function action($action) {
        $methodName = 'action' . $action;
        $this->beforeAction();
        return $this->$methodName();
    }

    protected function beforeAction() {

    }

    protected function actionIndex() {

        $this->view->title = 'Сообщения';
        $this->view->ip = $_SERVER['HTTP_USER_AGENT'];
        $this->view->messages = \App\Models\Message::findAll();
        echo $this->view->display(__DIR__ . '/../templates/index.php');
    }

    protected function actionOne() {
        $id = (int) $_GET['id'];
        $this->view->article = \App\Models\News::findById($id);
        //var_dump($this->view->article); die;
        echo $this->view->display(__DIR__ . '/../templates/one.php');

    }
}
