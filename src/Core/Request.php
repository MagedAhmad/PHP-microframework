<?php

namespace TrendingRepos\Core;

class Request {

    /**
     * @var array
     */
    public $parameters = [];


    /**
     * Request parameters
     * @var array
     */
    public $params = [];


    /**
     * Request clearn uri
     * @return mixed|string
     */
    public static function uri() {
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


    /**
     * Return request method type
     * @return mixed
     */
    public static function methodType() {
        return $_SERVER['REQUEST_METHOD'];
    }


    /**
     * Return Request parameters
     *
     * @return array
     */
    public function parameters() {
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



}