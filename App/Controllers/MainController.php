<?php
namespace App\Controllers;

use App\Exceptions\Core;
use App\Models\Message;
use App\Models\Pagination;
use App\Models\User;
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
        $pag = new Pagination();
        $data = Message::findAll();;
        $this->view->numbers = $pag->Paginate($data, 25);

        $this->view->messages = $pag->fetchResult();

        $this->view->title = 'Сообщения';
        echo $this->view->display(__DIR__ . '/../templates/index.php');
    }

    protected function actionEdit()
    {
        //$id = (int)$_GET['id'];
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
            if ($user->signin()) {
                header('Location: http://guest.dev/');
            } else {
                $_SESSION['error'] = 'Неправильный логин или пароль';
            }
        }
        $this->view->title = 'Войти';
        echo $this->view->display(__DIR__ . '/../templates/signin.php');
    }

    /**
     * Выход и удаление сессии
     */
    public function actionLogout()
    {
        session_start();
        unset($_SESSION['user']);
        header('Location: http://guest.dev/');
    }

    protected function actionNewMessage()
    {
        if ($_POST) {
            session_start();
            if (strtolower($_SESSION['captcha']['code']) !== strtolower($_POST['captcha'])) {
                $_SESSION['error'] = 'Вы неправильно ввели проверочный код';
            } else {
                $message = new Message();
                $res = $message->store();
                if ($res !== null) {
                    $this->view->errors = $res;
                } else {
                    header('Location: http://guest.dev');
                }
            }

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
        if ($_GET['id']) {
            $message->delete($_GET['id']);
        }
        $this->view->messages = \App\Models\Message::findAll();
        header('Location: http://guest.dev/index.php?action=Edit');
    }

    protected function actionUpdate()
    {
        $id = (int)$_GET['id'];

        if ($_POST) {
            $message = new Message();
            $res = $message->store($id);
            if ($res !== null) {
                $this->view->errors = $res;
                $this->view->message = \App\Models\Message::findById($_GET['id']);
                echo $this->view->display(__DIR__ . '/../templates/single.php');
            } else {
                header('Location: http://guest.dev/index.php?action=Edit');
            }
        }

        //$this->view->message = \App\Models\Message::findById($id);
    }

    /**
     * @throws \Exception
     */
    public function actionSearch()
    {
        //var_dump($_POST);
        $message = new Message();
        try {
            $this->view->messages = $message->search();
        } catch (\Exception $e) {
            $this->view->errors = 'Ничего не найдено';
        }
        echo $this->view->display(__DIR__ . '/../templates/index.php');
    }

    public function actionProfile($id)
    {
        session_start();
        $id = $_SESSION['user']->id;
        $user = new User();
        $this->view->user = $user->findById($id);
        var_dump($this->view->user);

    }
}
