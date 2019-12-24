<?php

namespace TrendingRepos\Core;

use TrendingRepos\Exception\RouterException;

class Router 
{
    public $routes;
    public $request;

    public function __construct(array $routes, Request $request)
    {
        $this->routes = $routes;
        $this->request = $request;
    }

    public function get() 
    {
        if (!$this->methodTypeExists()) {
            throw new RouterException('Routes file structure in not as we expect');
        }

        if (!$this->uriExists($this->request->getSlug())) {
            throw new RouterException('This is not the web page you are looking for!');
        }

        $this->direct($this->request->getSlug(), $this->request->getMethodType());
    }


    private function direct(string $uri, string $methodType) 
    {
        $this->callAction(
            ...explode('@', $this->routes[$methodType][$uri])
        );
    }

    private function callAction(string $controller, string $action)
    {
        $controller = "TrendingRepos\\Controller\\{$controller}";
        $controller = new $controller;

        if(!method_exists($controller, $action)) {
            throw new RouterException('This action doesn\'t exist!');
        }

        (new $controller)->$action();
    }

    private function uriExists(string $slug): bool
    {
        return array_key_exists($slug, $this->routes[$this->request->getMethodType()]);
    }

    protected function methodTypeExists(): bool
    {
        return array_key_exists($this->request->getMethodType(), $this->routes);
    }
}
