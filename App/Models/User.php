<?php

namespace App\Models;

use App\Model;

class User extends Model
{
    const TABLE = 'users';
    public $name;
    public $password;

    public function __construct()
    {

    }

    public function validate()
    {
        if (!preg_match("/^[a-zA-Z0-9]+$/", trim($_POST['name']))) {
            $err[] = "Логин может состоять только из букв английского алфавита и цифр";
        }
        if (strlen($_POST['name']) < 3 or strlen($_POST['name']) > 30) {
            $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
        }
        if ($this->findByName($_POST['name'])) {
            $err[] = 'Такой логин уже существует';
        }
        if ($_POST['password'] !== $_POST['password_confirm']) {
            //var_dump('pass');
            $err[] = 'Пароли не совпадают';
        }
        if (strlen($_POST['password']) < 4) {
            $err[] = 'Пароль должен быть не меньше 4-х символов';
        }
        return $err;
        /*if (count($err) == 0) {
            $this->name = trim($_POST['name']);
            $this->password = md5(md5(trim($_POST['password'])));
            $this->save();
        } else {
            return $err;
        }*/
    }

    public function registr($request)
    {
        $this->name = $request['name'];
        if ($request['password'] !== $request['password_confirm']) {
            $_SESSION['error'] = 'Пароли не совпадают';
            return false;
        } else {
            $this->password = $request['password'];
            return $this->save();
        }
    }
}
