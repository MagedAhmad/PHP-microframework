<?php

namespace App\Core;

class Request {

    public $parameters = [];
    public $params = [];

    public static function uri() {

        $uri = trim($_SERVER['REQUEST_URI'], '/');
        $uri= str_replace( $_SERVER['REQUEST_QUERY'], '', $uri );
        $uri= str_replace( $_SERVER['QUERY_STRING'], '', $uri );
        $uri = trim($uri, '?');



        return $uri;

    }


    public static function methodType() {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function parameters() {

        $url = $_SERVER['QUERY_STRING'];
        $this->parameters = explode('&', $url);
        array_map(function ($arg){
            $temp = explode('=', $arg);
            $this->params[$temp[0]] = $temp[1];
        }, $this->parameters);
        return $this->params;
    }
}