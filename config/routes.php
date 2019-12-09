<?php

return $routes = [
    'GET' => [
        '/' => 'HomeController@home',
        '/ping' => 'HealthCheckController@ping',
    ],
    'POST' => [],
];
