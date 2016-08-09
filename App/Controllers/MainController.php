<?php
namespace App\Controllers;

use App\Exceptions\Core;
use App\Models\Message;
use App\Models\User;
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

    protected function actionEdit()
    {

        $this->view->title = 'Сообщения';
        $this->view->messages = \App\Models\Message::findAll();
        echo $this->view->display(__DIR__ . '/../templates/edit.php');
    }

    protected function actionSignup()
    {
        if ($_POST) {
            $user = new User();
            $res = $user->signup($_POST);
            if ($res !== null) {
                $this->view->errors = $res;
                //echo $this->view->display(__DIR__ . '/../templates/signup.php');
            } else {
                header('Location: http://guest.dev');
            }
        }


        $this->view->title = 'Регистрация';
        echo $this->view->display(__DIR__ . '/../templates/signup.php');
    }

    public function actionSignin()
    {
        if ($_POST) {
            $user = new User();
            if ($user->signin()){
                $_SESSION['user'] = $user;
                header('Location: http://guest.dev/');
            }else{
                $_SESSION['error'] = 'Неправильный логин или пароль';
            }
        }
        $this->view->title = 'Войти';
        echo $this->view->display(__DIR__ . '/../templates/signin.php');
    }

    protected function actionNewMessage()
    {
        session_start();
        include("simple-php-captcha.php");
        $_SESSION['captcha'] = simple_php_captcha();

        if ($_POST) {
            $request = $_POST;
            $message = new Message();
            $message->store($request);
        }
        $this->view->title = 'Новое сообщение';
        echo $this->view->display(__DIR__ . '/../templates/new.php');
    }

    protected function actionSingle()
    {
        $this->view->message = \App\Models\Message::findById($_GET['id']);
        echo $this->view->display(__DIR__ . '/../templates/single.php');
    }

    protected function actionDelete()
    {
        $message = new Message();
        $message->delete($_GET['id']);
        $this->view->messages = \App\Models\Message::findAll();
        //$this->view->message = \App\Models\Message::findById($_GET['id']);
        echo $this->view->display(__DIR__ . '/../templates/index.php');
    }

    protected function actionUpdate()
    {
        $id = (int)$_GET['id'];
        $this->view->message = \App\Models\Message::findById($id);

        if ($_POST) {
            $message = new Message();
            $message->store($_POST, $_GET['id']);
            header('Location: http://guest.dev/');
            exit;
        }
        /*if($_POST) {
            $this->view->article              = new News();
            $this->view->article->id          = $id;
            $this->view->article->title       = $_POST['title'];
            $this->view->article->description = $_POST['description'];
            $this->view->article->lead        = $_POST['lead'];
            $this->view->article->author_id   = $_POST['author_id'];
            $this->view->article->save( $id );
            header( 'Location: http://localhost/profit/Admin/index.php' );
            exit;
        }*/
        $this->view->display(__DIR__ . '/../../Admin/update.php');
    }
}
