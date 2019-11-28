<?php

use PHPUnit\Framework\TestCase;
use TrendingRepos\Core\Router;
use TrendingRepos\Core\Request;
use TrendingRepos\Exception\RouterException;

class RouterTest extends TestCase
{
    protected $router;
    protected $client;

    public function setUp(): void
    {
        $routes = require './config/routes.php';
        $this->router = new Router($routes, new Request);
    }

    public function test_catch_exception_when_visiting_wrong_url()
    {
        $this->expectException(RouterException::class);
        $this->get('/wrong-url');
        $this->router->get();
    }

    public function test_catch_exception_when_method_in_controller_doesnt_exist()
    {
        $this->expectException(RouterException::class);
        $this->get('/test');
        $this->router->get();
    }

    public function test_catch_exception_when_routes_file_is_in_wrong_format()
    {
        $this->expectException(RouterException::class);
        $this->get('/');
        $this->router = new Router(['/' => 'HomeController@home'], new Request);
        $this->router->get();
    }

    protected function get(string $uri)
    {
        $this->call($uri, 'GET');
    }

    protected function post(string $uri)
    {
        $this->call($uri, 'POST');
    }

    private function call(string $uri, string $methodType) {
        $_SERVER['PATH_INFO'] = $uri;
        $_SERVER['REQUEST_METHOD'] = $methodType;
    }
}
