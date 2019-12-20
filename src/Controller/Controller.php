<?php

namespace TrendingRepos\Controller;

use TrendingRepos\App;

class Controller
{
    protected $registry;

    public function __construct()
    {
        $this->registry = (new App())->registry;
    }
}
