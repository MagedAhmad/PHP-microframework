<?php

namespace TrendingRepos\Core;

class Request 
{
    public function getMethodType(): string 
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getSlug(): string 
    {
        return $_SERVER['PATH_INFO'] ?? '/';
    }
}
