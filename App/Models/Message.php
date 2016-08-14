<?php

namespace App\Models;

use App\Model;
use App\Exceptions\Core;
use App\Db;

class Message extends Model
{
    const TABLE = 'messages';
    public $name;
    public $email;
    public $message;
    public $homepage;
    public $ip;
    public $browser;
    public $file;



    /**
     * LAZY LOAD
     *
     * @param string $name
     *
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

    /**
     * @param string $k
     *
     * @return bool
     */
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

    /**
     * Добавление или обновление записи в таблицу messages
     * @param int $id
     * @return array|string
     */
    public function store($id = null)
    {
        // Валидация имени пользователя. Разрешены буквы латинского алфавита и цифры. Пробелы недопустимы.
        $this->name = $this->clean($_POST['name']);
        if (!preg_match("/^[a-zA-Z0-9]+$/", $this->name)) {
            $err[] = "Логин может состоять только из букв английского алфавита и цифр без пробелов";
        }

        // Валидация на корректность адреса эл. почты
        if (strlen($_POST['name']) < 3 or strlen($_POST['name']) > 30) {
            $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
        }
        $this->email = $this->clean($_POST['email']);
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $err[] = "Неправильный email";
        }

        // Если введен url, то проверка на корректность.
        if (empty($_POST['homepage'])) {
            $this->homepage = '';
        } else {
            $this->homepage = $this->clean($_POST['homepage']);
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",
                $this->homepage)
            ) {
                $err[] = "Неправильный URL";
            }
        }
        // Закрываем теги
        $this->message = $this->closetags($_POST['message']);

        //Определяем ip пользователя. Если ::1, по заносим в базу, как localhost
        $this->ip = ($_SERVER['REMOTE_ADDR'] == '::1') ? 'localhost' : $_SERVER['REMOTE_ADDR'];
        $user_agent = getenv('HTTP_USER_AGENT');;
        $this->browser = $this->user_browser($user_agent);
        // Проверка загружаемого файла
        $this->file = is_uploaded_file($_FILES['file']['tmp_name']) ? $_FILES['file'] : null;
        $file_type = $this->file['type'];
        if ($file_type) {
            if ($file_type == 'image/gif' or $file_type == 'image/png' or $file_type == 'image/jpeg') {
                $this->file = $this->resize($this->file['tmp_name'], 0, 320, 240);
                if ($this->file == false) {
                    $err[] = 'Не удалось изменить размер изображения';
                }
            } elseif ($file_type == 'text/plain') {
                if ($this->file['size'] > 1024000) {
                    $err[] = 'Файл слишком большой';
                }
            } else {
                $err[] = 'Неправильный формат файла';
            }
        }

        $uploadfile = $this->file ? "uploads/" . $this->name . '_' . $_FILES['file']['name'] : '';
        if (!empty($uploadfile) && !move_uploaded_file($_FILES['file']['tmp_name'],
                $uploadfile)
        ) {
            $err[] = 'Не удалось загрузить файл';
        } else {
            $this->file = $uploadfile;
        }
        // Если ошибок нет, то сохраняем в базу
        if (count($err) == 0) {
            if (isset($id)) {
                $this->save((int)$id);
            } else {
                $this->save();

                header('Location: http://guest.dev/');
            }
        } else {
            return $err;
        }

    }

    /**
     * Удаление из БД
     *
     * @param int $id id записи
     *
     * @return void
     */
    public function deleteFileFromDb($id)
    {
        $message = $this::findById($id);
        $message->file = null;
        $message->save($id);
    }

    /**
     * Убираем теги, пробелы.....
     *
     * @param string $value данные пользователя
     *
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

    /**
     * Закрываем теги
     *
     * @param $html
     * @return string
     */
    private function closetags($html)
    {
        preg_match_all('#<(?!meta|img|br|hr|input\b)\b([a-z]+)(?: .*)?(?<![/|/ ])>#iU',
            $html, $result);
        $openedtags = $result[1];
        preg_match_all('#</([a-z]+)>#iU', $html, $result);
        $closedtags = $result[1];
        $len_opened = count($openedtags);
        if (count($closedtags) == $len_opened) {
            return $html;
        }
        $openedtags = array_reverse($openedtags);
        for ($i = 0; $i < $len_opened; $i++) {
            if (!in_array($openedtags[$i], $closedtags)) {
                $html .= '</' . $openedtags[$i] . '>';
            } else {
                unset($closedtags[array_search($openedtags[$i], $closedtags)]);
            }
        }

        return $html;
    }

    /**
     * Стырено в интернетах
     * Проверял в Chrome. FireFox и Safari
     * @param $agent
     * @return string
     */
    function user_browser($agent)
    {
        preg_match("/(MSIE|Opera|Firefox|Chrome|Version|Opera Mini|Netscape|Konqueror|SeaMonkey|Camino|Minefield|Iceweasel|K-Meleon|Maxthon)(?:\/| )([0-9.]+)/",
            $agent,
            $browser_info); // регулярное выражение, которое позволяет отпределить 90% браузеров
        list(, $browser, $version) = $browser_info; // получаем данные из массива в переменную
        if (preg_match("/Opera ([0-9.]+)/i", $agent, $opera)) {
            return 'Opera ' . $opera[1];
        } // определение _очень_старых_ версий Оперы (до 8.50), при желании можно убрать
        if ($browser == 'MSIE') { // если браузер определён как IE
            preg_match("/(Maxthon|Avant Browser|MyIE2)/i", $agent,
                $ie); // проверяем, не разработка ли это на основе IE
            if ($ie) {
                return $ie[1] . ' based on IE ' . $version;
            } // если да, то возвращаем сообщение об этом
            return 'IE ' . $version; // иначе просто возвращаем IE и номер версии
        }
        if ($browser == 'Firefox') { // если браузер определён как Firefox
            preg_match("/(Flock|Navigator|Epiphany)\/([0-9.]+)/", $agent,
                $ff); // проверяем, не разработка ли это на основе Firefox
            if ($ff) {
                return $ff[1] . ' ' . $ff[2];
            } // если да, то выводим номер и версию
        }
        if ($browser == 'Opera' && $version == '9.80') {
            return 'Opera ' . substr($agent, -5);
        } // если браузер определён как Opera 9.80, берём версию Оперы из конца строки
        if ($browser == 'Version') {
            return 'Safari ' . $version;
        } // определяем Сафари
        if (!$browser && strpos($agent, 'Gecko')) {
            return 'Browser based on Gecko';
        } // для неопознанных браузеров проверяем, если они на движке Gecko, и возращаем сообщение об этом
        return $browser . ' ' . $version; // для всех остальных возвращаем браузер и версию
    }

    /**
     * easy image resize function
     * @param  $file - file name to resize
     * @param  $string - The image data, as a string
     * @param  $width - new image width
     * @param  $height - new image height
     * @param  $proportional - keep image proportional, default is no
     * @param  $output - name of the new file (include path if needed)
     * @param  $delete_original - if true the original image will be deleted
     * @param  $use_linux_commands - if set to true will use "rm" to delete the image, if false will use PHP unlink
     * @param  $quality - enter 1-100 (100 is best quality) default is 100
     * @return boolean|resource
     */
    private function resize(
        $file,
        $string = null,
        $width = 0,
        $height = 0,
        $proportional = true,
        $output = 'file',
        $delete_original = true,
        $use_linux_commands = false,
        $quality = 100
    ) {
        if ($height <= 0 && $width <= 0) {
            return false;
        }
        if ($file === null && $string === null) {
            return false;
        }

        # Setting defaults and meta
        $info = $file !== null ? getimagesize($file) : getimagesizefromstring($string);
        $image = '';
        $final_width = 0;
        $final_height = 0;
        list($width_old, $height_old) = $info;
        $cropHeight = $cropWidth = 0;

        # Calculating proportionality
        if ($proportional) {
            if ($width == 0) {
                $factor = $height / $height_old;
            } elseif ($height == 0) {
                $factor = $width / $width_old;
            } else {
                $factor = min($width / $width_old, $height / $height_old);
            }

            $final_width = round($width_old * $factor);
            $final_height = round($height_old * $factor);
        } else {
            $final_width = ($width <= 0) ? $width_old : $width;
            $final_height = ($height <= 0) ? $height_old : $height;
            $widthX = $width_old / $width;
            $heightX = $height_old / $height;

            $x = min($widthX, $heightX);
            $cropWidth = ($width_old - $width * $x) / 2;
            $cropHeight = ($height_old - $height * $x) / 2;
        }

        # Loading image to memory according to type
        switch ($info[2]) {
            case IMAGETYPE_JPEG:
                $file !== null ? $image = imagecreatefromjpeg($file) : $image = imagecreatefromstring($string);
                break;
            case IMAGETYPE_GIF:
                $file !== null ? $image = imagecreatefromgif($file) : $image = imagecreatefromstring($string);
                break;
            case IMAGETYPE_PNG:
                $file !== null ? $image = imagecreatefrompng($file) : $image = imagecreatefromstring($string);
                break;
            default:
                return false;
        }


        # This is the resizing/resampling/transparency-preserving magic
        $image_resized = imagecreatetruecolor($final_width, $final_height);
        if (($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG)) {
            $transparency = imagecolortransparent($image);
            $palletsize = imagecolorstotal($image);

            if ($transparency >= 0 && $transparency < $palletsize) {
                $transparent_color = imagecolorsforindex($image, $transparency);
                $transparency = imagecolorallocate($image_resized,
                    $transparent_color['red'],
                    $transparent_color['green'], $transparent_color['blue']);
                imagefill($image_resized, 0, 0, $transparency);
                imagecolortransparent($image_resized, $transparency);
            } elseif ($info[2] == IMAGETYPE_PNG) {
                imagealphablending($image_resized, false);
                $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
                imagefill($image_resized, 0, 0, $color);
                imagesavealpha($image_resized, true);
            }
        }
        imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight,
            $final_width, $final_height,
            $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);


        # Taking care of original, if needed
        if ($delete_original) {
            if ($use_linux_commands) {
                exec('rm ' . $file);
            } else {
                @unlink($file);
            }
        }

        # Preparing a method of providing result
        switch (strtolower($output)) {
            case 'browser':
                $mime = image_type_to_mime_type($info[2]);
                header("Content-type: $mime");
                $output = null;
                break;
            case 'file':
                $output = $file;
                break;
            case 'return':
                return $image_resized;
                break;
            default:
                break;
        }

        # Writing image according to type to the output destination and image quality
        switch ($info[2]) {
            case IMAGETYPE_GIF:
                imagegif($image_resized, $output);
                break;
            case IMAGETYPE_JPEG:
                imagejpeg($image_resized, $output, $quality);
                break;
            case IMAGETYPE_PNG:
                $quality = 9 - (int)((0.9 * $quality) / 10.0);
                imagepng($image_resized, $output, $quality);
                break;
            default:
                return false;
        }

        return true;
    }
}
