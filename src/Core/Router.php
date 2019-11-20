<?php

namespace TrendingRepos\Core;

use TrendingRepos\Core\Request;

class Router {

    public $routes;
    public $request;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
        $this->request = new Request;
        $this->get();
    }

    public function get() {
        try {
            if($this->uriExists()){
                $this->direct($this->request->getSlug(), 'GET');
            }
            throw new \InvalidArgumentException($this->request->getSlug() . ' is not a valid route!');
        }
        catch(\InvalidArgumentException $e) {
            echo $e->getMessage();
        }
    }

    public function direct(string $uri, string $methodType) {
        try {

            return $this->callAction(
                ...explode('@', $this->routes[$methodType][$uri])
            );
        }catch( \Exception $e) {
            echo $e->getMessage();
        }
    }

    public function callAction(string $controller, string $action){
        $controller = "TrendingRepos\\Controller\\{$controller}";
        $controller = new $controller;

        if(! method_exists($controller, $action)){
            throw new \InvalidArgumentException("This Action doesn't exist");
        }

        return (new $controller)->$action();
    }

    private function uriExists() {
        return key_exists($this->request->getSlug(), $this->routes['GET']);
    }
}
