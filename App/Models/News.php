<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 13.04.16
 * Time: 12:04
 */

namespace App\Models;


use App\Model;

class News extends Model
{

    const TABLE = 'messages';

    public $title;
    public $lead;
    public $author_id;

    /**
     * LAZY LOAD
     *
     * @param $k
     * @return null
     */
    public function __get($k)
    {
        switch ($k) {
            case 'author':
                return Author::findById($this->author_id);
                break;
            default:
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

}
