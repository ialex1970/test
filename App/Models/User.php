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
