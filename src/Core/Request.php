<?php

namespace TrendingRepos\Core;

class Request {

    public function methodType() : string {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getSlug() : string {
        return $uri = $_SERVER['PATH_INFO'] ?? '/';
    }
}
