<?php

namespace App\Models;

use App\Model;
use App\Exceptions\Core;
use App\Db;

class Message extends Model
{
    const TABLE = 'messages';
    //public $user_id;
    public $name;
    public $email;
    public $message;
    public $homepage;
    public $ip;
    public $browser;
    //public $published_at;


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
            case 'user':
                return !empty($this->user);
                break;
            default:
                return false;
        }
    }

    public function store($request)
    {
        $this->name = $request['name'];
        $this->email = $request['email'];
        $this->message = $request['message'];
        //$this->published_at = time();
        $this->homepage = isset($request['homepage']) ? $request['homepage'] : '';
        $this->ip = ($_SERVER['REMOTE_ADDR'] == '::1') ? 'localhost' : $_SERVER['REMOTE_ADDR'];
        $user_agent = getenv('HTTP_USER_AGENT');;
        $this->browser = $this->user_browser($user_agent);

        $sql = "INSERT INTO `messages` (name, email, message) 
                VALUES ($this->name, $this->email, $this->message)";
        $this->save();
        header('Location: http://guest.dev/');
    }

    /**
     * Стырено в интернетах
     * Проверял в Chrome. FireFox и Safari
     * @param $agent
     * @return string
     */
    function user_browser($agent)
    {
        preg_match("/(MSIE|Opera|Firefox|Chrome|Version|Opera Mini|Netscape|Konqueror|SeaMonkey|Camino|Minefield|Iceweasel|K-Meleon|Maxthon)(?:\/| )([0-9.]+)/", $agent, $browser_info); // регулярное выражение, которое позволяет отпределить 90% браузеров
        list(, $browser, $version) = $browser_info; // получаем данные из массива в переменную
        if (preg_match("/Opera ([0-9.]+)/i", $agent, $opera)) return 'Opera ' . $opera[1]; // определение _очень_старых_ версий Оперы (до 8.50), при желании можно убрать
        if ($browser == 'MSIE') { // если браузер определён как IE
            preg_match("/(Maxthon|Avant Browser|MyIE2)/i", $agent, $ie); // проверяем, не разработка ли это на основе IE
            if ($ie) return $ie[1] . ' based on IE ' . $version; // если да, то возвращаем сообщение об этом
            return 'IE ' . $version; // иначе просто возвращаем IE и номер версии
        }
        if ($browser == 'Firefox') { // если браузер определён как Firefox
            preg_match("/(Flock|Navigator|Epiphany)\/([0-9.]+)/", $agent, $ff); // проверяем, не разработка ли это на основе Firefox
            if ($ff) return $ff[1] . ' ' . $ff[2]; // если да, то выводим номер и версию
        }
        if ($browser == 'Opera' && $version == '9.80') return 'Opera ' . substr($agent, -5); // если браузер определён как Opera 9.80, берём версию Оперы из конца строки
        if ($browser == 'Version') return 'Safari ' . $version; // определяем Сафари
        if (!$browser && strpos($agent, 'Gecko')) return 'Browser based on Gecko'; // для неопознанных браузеров проверяем, если они на движке Gecko, и возращаем сообщение об этом
        return $browser . ' ' . $version; // для всех остальных возвращаем браузер и версию
    }


}
