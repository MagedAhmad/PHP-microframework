<?php

namespace App\Core;

use App\Core\Request;

class Router {

    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file) {
        $router = new static;

        require $file;

        return $router;
    }


    public function get($uri, $controller) {
        $parameters = (new Request)->parameters();
        if(isset($parameters)) {
           $uri = trim($_SERVER['REQUEST_URI'],$parameters);
           if($uri  == null) {
               $uri = '';
           }
        }

        $this->routes['GET'][$uri] = $controller;
    }


    public function post($uri, $controller) {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $methodType) {
        if(array_key_exists($uri, $this->routes[$methodType])) {
            $some = explode('@',$this->routes[$methodType][$uri]);

            return $this->callAction(
                ...explode('@', $this->routes[$methodType][$uri])
            );
//            return $this->routes[$methodType][$uri];
        }

        throw new \Exception('Couldnt find this path');
    }


    public function callAction($controller, $action){
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if(! method_exists($controller, $action)){
            throw new \Exception("{$controller} doesnt respond to the {$action} action");
        }

        return (new $controller)->$action();
    }

}