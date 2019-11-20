<?php

namespace TrendingRepos\Core;

use TrendingRepos\Exceptions\RouterException;

class Router {

    public $routes;
    public $request;

    public function __construct(array $routes, $request)
    {
        $this->routes = $routes;
        $this->request = $request;
        $this->get();
    }

    public function get() {
        try {
            if($this->uriExists()){
                $this->direct($this->request->getSlug(), $this->request->methodType());
            }
            throw new RouterException('This is not the web page you are looking for!');
        }
        catch(RouterException $e) {
            echo $e->getErrorMsg();
        }
    }

    public function direct(string $uri, string $methodType) {
        try {

            return $this->callAction(
                ...explode('@', $this->routes[$methodType][$uri])
            );
        }catch(RouterException $e) {
            echo $e->getErrorMsg(); 
        }
    }

    public function callAction(string $controller, string $action){
        $controller = "TrendingRepos\\Controller\\{$controller}";
        $controller = new $controller;

        if(! method_exists($controller, $action)){
            throw new RouterException('This action doesn\' exist!');
        }

        return (new $controller)->$action();
    }

    private function uriExists() : bool {
        return key_exists($this->request->getSlug(), $this->routes['GET']);
    }
}
