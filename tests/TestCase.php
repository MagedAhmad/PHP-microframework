<?php

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
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
        $this->router->get();
    }
}