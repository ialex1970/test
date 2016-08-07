<?php
namespace App\Controllers;

use App\Exceptions\Core;
use App\Models\Message;
use App\View;

class MainController
{

    protected $view;

    //protected $title;

    public function __construct()
    {
        $this->view = new View();

    }

    public function action($action)
    {
        $methodName = 'action' . $action;
        var_dump($methodName);
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
        var_dump($_POST);
        /*        if (!$_POST) {
                    return;
                }
                $request = $_POST;
                $user = new User($request);
                $this->view->title = 'Регистрация';*/

        $this->view->title = 'Регистрация';
        echo $this->view->display(__DIR__ . '/../templates/signup.php');
    }

    protected function actionNewMessage()
    {

        print_r($_POST );

        if ($_POST) {
            $request = $_POST;
            $message = new Message($request);
        }

        $this->view->title = 'Новое сообщение';
        echo $this->view->display(__DIR__ . '/../templates/new.php');
    }
}
