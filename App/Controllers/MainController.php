<?php

namespace App\Controllers;

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

    /**
     * Получаем имя экшена
     * @param $action
     * @return mixed
     */
    public function action($action)
    {
        $methodName = 'action' . $action;
        $this->beforeAction();

        return $this->$methodName();
    }

    protected function beforeAction()
    {
    }


    /**
     * Домашняя страница
     */
    protected function actionIndex()
    {
        $pag = new Pagination();

        if ($_GET) {
            $data = Message::findAll($_GET['col'], $_GET['dir']);
        } else {
            $data = Message::findAll();
        }

        $this->view->numbers = $pag->Paginate($data, 25);

        $this->view->messages = $pag->fetchResult();
        $this->view->title = 'Сообщения';
        echo $this->view->display(__DIR__ . '/../templates/index.php');
    }

    /**
     * Редактирование сообщения
     */
    protected function actionEdit()
    {
        $this->view->title = 'Сообщения';
        $this->view->messages = Message::findAll();
        echo $this->view->display(__DIR__ . '/../templates/edit.php');
    }

    /**
     * Регистрация пользователя
     */
    protected function actionSignup()
    {
        if ($_POST) {
            $user = new User();
            $res = $user->signup();
            if ($res !== null) {
                $this->view->errors = $res;
            } else {
                header('Location: http://test.dev');
            }
        }
        $this->view->title = 'Регистрация';
        echo $this->view->display(__DIR__ . '/../templates/signup.php');
    }

    /**
     * Вход
     */
    public function actionSignin()
    {
        if ($_POST) {
            $user = new User();
            if ($user->signin()) {
                header('Location: http://test.dev/');
            } else {
                //$_SESSION['error'] = 'Неправильный логин или пароль';
                $this->view->error = 'Неправильныйы логин или пароль';
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
        header('Location: http://test.dev/');
    }

    /**
     * Новое сообщегие
     */
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
                    header('Location: http://test.dev');
                }
            }
        }
        $this->view->title = 'Новое сообщение';
        echo $this->view->display(__DIR__ . '/../templates/new.php');
    }

    /**
     * Просмотр сообщения
     */
    protected function actionSingle()
    {
        $this->view->message = Message::findById($_GET['id']);

        echo $this->view->display(__DIR__ . '/../templates/single.php');
    }

    /**
     * Удаление сообщения
     */
    protected function actionDelete()
    {

        if ($_GET['id']) {
            $message = Message::findById($_GET['id']);

            if ($message->file) {
                unlink($message->file);
            }
            $message->delete($_GET['id']);
        }
        header('Location: http://test.dev');
    }

    /**
     * Удаление загруженного файла
     */
    protected function actionDeleteFile()
    {
        $message = Message::findById($_GET['id']);
        unlink($message->file);
        $message->deleteFileFromDb($_GET['id']);
        header("Location: http://test.dev/index.php?action=Single&id=$message->id");
    }

    /**
     * Обновление сообщения
     */
    protected function actionUpdate()
    {
        $id = (int)$_GET['id'];
        if ($_POST) {
            $message = Message::findById($id);
            if ($message->file) {
                unlink($message->file);
            }
            $res = $message->store($id);
            if ($res != null) {
                $this->view->errors = $res;
                $this->view->message = Message::findById($_GET['id']);
                echo $this->view->display(__DIR__ . '/../templates/single.php');
            } else {
                header('Location: http://test.dev');
            }
        }
    }

    /**
     * Поиск по сообщениям и навбара
     * @throws \Exception
     */
    public function actionSearch()
    {
        $message = new Message();
        try {
            $this->view->messages = $message->search();
        } catch (\Exception $e) {
            $this->view->errors = 'Ничего не найдено';
        }
        echo $this->view->display(__DIR__ . '/../templates/index.php');
    }

    /**
     * TODO реализовать метод
     * @param $id
     */
    public function actionProfile($id)
    {
        session_start();
        $id = $_SESSION['user']->id;
        $user = new User();
        $this->view->user = $user->findById($id);
    }
}
