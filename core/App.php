<?php

namespace App\Core;

class App {

    /**
     * @var array
     */
    protected static $registery = [];


    /**
     * @param $key
     * @param $value
     */
    public static function bind($key, $value) {

        static::$registery[$key] = $value;
    }

    /**
     * @param $key
     * @return mixed
     */
    public static function get($key) {

        if(!array_key_exists($key, static::$registery)) {
            throw new \Exception("No {$key} is bound in the container");
        }

        return static::$registery[$key];
    }

}