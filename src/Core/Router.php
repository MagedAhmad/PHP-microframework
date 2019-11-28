<?php

namespace TrendingRepos\Core;

use TrendingRepos\Exception\RouterException;
use TrendingRepos\Core\Request;

class Router {

    public $routes;
    public $request;

    public function __construct(array $routes, Request $request)
    {
        $this->routes = $routes;
        $this->request = $request;
    }

    public function get() {
        if(array_key_exists($this->request->methodType(), $this->routes)) {
            $slug = $this->request->getSlug();

            if($this->uriExists($slug)){
                $this->direct($this->request->getSlug(), $this->request->methodType());
            }else {
                throw new RouterException('This is not the web page you are looking for!');
            }
        }else {
            throw new RouterException('Routes file structure in not as we expect');
        }
    }

    private function direct(string $uri, string $methodType) {
        $this->callAction(
            ...explode('@', $this->routes[$methodType][$uri])
        );
    }

    private function callAction(string $controller, string $action){
        $controller = "TrendingRepos\\Controller\\{$controller}";
        $controller = new $controller;

        if(!method_exists($controller, $action)) {
            throw new RouterException('This action doesn\' exist!');
        }

        (new $controller)->$action();
    }

    private function uriExists($slug) : bool {
        return array_key_exists($slug, $this->routes[$this->request->methodType()]);
    }
}
