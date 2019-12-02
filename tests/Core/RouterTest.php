<?php

// use PHPUnit\Framework\TestCase;
use TrendingRepos\Core\Router;
use TrendingRepos\Core\Request;
use TrendingRepos\Exception\RouterException;
use Tests\TestCase;

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
    }

    public function test_catch_exception_when_method_in_controller_doesnt_exist()
    {
        $this->expectException(RouterException::class);
        $this->get('/test');
    }

    public function test_catch_exception_when_routes_file_is_in_wrong_format()
    {
        $this->expectException(RouterException::class);
        $this->router = new Router(['/' => 'HomeController@home'], new Request);
        $this->get('/');
    }
}
