<?php

namespace App;

trait Singleton {
    protected static $_instance;
    protected function __construct() {

    }
    
    public static function instance() {
        if(self::$_instance === null)
            return static::$_instance = new static;
        return static::$_instance;
    }
}
