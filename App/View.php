<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12.04.16
 * Time: 11:54
 */

namespace App;


class View {
    protected $data;

    public function __set( $name, $value ) {
        $this->data[$name] = $value;
    }

    public function __get( $name ) {
        if ($name)
        return $this->data[$name];
    }

    public function render($template) {
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function display($template) {

        echo $this->render($template);
    }
}