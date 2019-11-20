<?php

namespace TrendingRepos\Core;

class Request {

    public $parameters = [];
    public $params = [];

    public static function uri() : string {
        $uri = trim($_SERVER['REQUEST_URI'], '/');

        if(!empty($_SERVER['REQUEST_QUERY'])){
            $uri= str_replace( $_SERVER['REQUEST_QUERY'], '', $uri );
        }

        if(!empty($_SERVER['QUERY_STRING'])) {
            $uri= str_replace( $_SERVER['QUERY_STRING'], '', $uri );
        }
        $uri = trim($uri, '?');

        return $uri;
    }

    public function methodType() : string {

        return $_SERVER['REQUEST_METHOD'];
    }

    public function parameters() : array {

        if(!empty($_SERVER['QUERY_STRING'])){
            $url = $_SERVER['QUERY_STRING'];
            $this->parameters = explode('&', $url);
            array_map(function ($arg){
                $temp = explode('=', $arg);
                if(!isset($this->params[$temp[0]])) {
                    return;
                }else {
                    $this->params[$temp[0]] = $temp[1];
                }

            }, $this->parameters);

            return $this->params;
        }
    }

    public function getSlug() : string {

        if(!empty($_SERVER['PATH_INFO'])){
            $uri = $_SERVER['PATH_INFO'];
        }else {
            $uri = '/';
        }
        
        return $uri;
    }
}
