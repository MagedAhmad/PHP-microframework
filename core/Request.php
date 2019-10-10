<?php

namespace App\Core;

class Request {

    public static function uri() {
        return trim($_SERVER['REQUEST_URI'], '/');
    }


    public static function methodType() {
        return $_SERVER['REQUEST_METHOD'];
    }
}