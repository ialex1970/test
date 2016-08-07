<?php

namespace App\Models;

use App\Model;
use App\Db;

class Message extends Model
{
    const TABLE = 'messages';
    public $user_id;
    public $ip;


    /**
     * LAZY LOAD
     *
     * @param $name
     * @return null
     */
    public function __get($name)
    {
        if ($name == 'user') {
            //return $this->getAuthor( $this->author_id );
            return User::findById($this->user_id);
        } else {
            return null;
        }
    }
    public function __isset($k)
    {
        switch ($k) {
            case 'author':
                return !empty($this->author_id);
                break;
            default:
                return false;
        }
    }

    public function user()
    {
        $db = \Db::instance();
        var_dump($db); die();
        $sql = "SELECT name FROM `users` WHERE 'id' = $this->user_id";
        $this->user = $db->query($sql);
    }


}
