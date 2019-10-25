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
        if(!empty($parameters)) {
            foreach($parameters as $key => $value) {
                $uri = trim($uri, $key . '=' . $value);
            }
            $uri = trim($uri, '/?');


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
        return view('404');
    }


    public function callAction($controller, $action){
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if(! method_exists($controller, $action)){
            throw new \Exception("This Action doesn't exit on the controller");
        }

        return (new $controller)->$action();
    }

}