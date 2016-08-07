<?php
namespace App\Controllers;

use App\Exceptions\Core;
use App\View;

class MainController
{

    protected $view;

    public function __construct()
    {
        $this->view = new View();

    }

    public function action($action)
    {
        $methodName = 'action' . $action;
        $this->beforeAction();
        return $this->$methodName();
    }

    protected function beforeAction()
    {

    }

    protected function actionIndex()
    {

        $this->view->title = 'Сообщения';
        $this->view->messages = \App\Models\Message::findAll();
        echo $this->view->display(__DIR__ . '/../templates/index.php');
    }

    protected function actionSignup()
    {
/*        if (!$_POST) {
            return;
        }
        $request = $_POST;
        $user = new User($request);
        $this->view->title = 'Регистрация';*/
        echo $this->view->display(__DIR__ . '/../templates/signup.php');
    }
}
