<?php

namespace App\Models;

use App\Model;

class User extends Model
{
    const TABLE = 'users';
    public $name;
    public $password;
    private $user;

    /**
     * Регистрация нового пользователя
     *
     * @return array
     */
    public function signup()
    {
        if (!preg_match("/^[a-zA-Z0-9]+$/", trim($_POST['name']))) {
            $err[] = "Логин может состоять только из букв английского алфавита и цифр";
        }
        if (strlen($_POST['name']) < 3 or strlen($_POST['name']) > 30) {
            $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
        }
        if ($this->findByName($this->clean($_POST['name']))) {
            $err[] = 'Такой логин уже существует';
        }
        if ($_POST['password'] !== $_POST['password_confirm']) {
            $err[] = 'Пароли не совпадают';
        }
        if (strlen($_POST['password']) < 4) {
            $err[] = 'Пароль должен быть не меньше 4-х символов';
        }
        if (count($err) == 0) {
            $this->name = trim($_POST['name']);
            $this->password = md5(md5(trim($_POST['password'])));
            $this->save();
            $this->signin();

        } else {
            return $err;
        }
    }

    /**
     * Вход
     *
     * @return bool
     */
    public function signin()
    {
        $this->name = trim($_POST['name']);
        $this->password = md5(md5(trim($_POST['password'])));
        $this->user = $this->findByName($this->name);

        if ($this->user->name === $this->name && $this->user->password === $this->password) {
            session_start();
            $_SESSION['user'] = $this->user;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Убираем теги
     * @param string $value
     * @return string
     */
    private function clean($value = "")
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }
}
