<?php

use PHPUnit\Framework\TestCase;
use TrendingRepos\Core\Router;
use TrendingRepos\Core\Request;

class RouterTest extends TestCase
{
    protected $router;
    protected $request;

    public function setUp(): void
    {
        $this->request = $this->createMock(Request::class);
        $this->router = new Router(['GET' => []], $this->request);
    }

    public function test_catch_exception_when_visiting_wrong_url()
    {
        $this->expectExceptionMessage('This is not the web page you are looking for!');
        $this->get('/wrong-url');
        $this->router->get();
    }

    public function test_catch_exception_when_method_in_controller_doesnt_exist()
    {
        $this->expectExceptionMessage('This action doesn\'t exist!');
        $routes = [
            'GET' => [
                '/test' => 'HomeController@test',
            ]
        ];
        $this->router = new Router($routes, $this->request);
        $this->get('/test');
        $this->router->get();
    }

    public function test_catch_exception_when_routes_file_is_in_wrong_format()
    {
        $this->expectExceptionMessage('Routes file structure in not as we expect');
        $this->router = new Router(['/' => 'HomeController@home'], $this->request);
        $this->get('/');
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

    private function call(string $uri, string $methodType) 
    {
        $this->request->method('getSlug')
            ->willReturn($uri);
        $this->request->method('methodType')
            ->willReturn($methodType);
    }
}
