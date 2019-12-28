<?php

namespace TrendingRepos\Controller;

class HealthCheckController extends AbstractController 
{
    public function ping()
    {
        echo 'OK';
    }
}
