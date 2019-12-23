<?php

namespace TrendingRepos\Controller;

use TrendingRepos\App;

class Controller
{
    protected $config;

    public function __construct()
    {
        $this->config = (new App())->registry['config'];
    }
}
