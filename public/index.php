<?php

use TrendingRepos\App;
use TrendingRepos\Core\Request;
use TrendingRepos\Core\Router;
use TrendingRepos\Database\Connection;
use TrendingRepos\Database\QueryBuilder;

require '../vendor/autoload.php';
require '../functions.php';

App::bind('config', require '../config/config.php');

ini_set('error_reporting', E_ALL);
ini_set('display_errors', App::get('config')['env'] == 'development' ? 'On' : 'Off');

// Commented for now. Why do we need DB at all for this project?
//App::bind('database', new QueryBuilder(
//    Connection::make(App::get('config')['database'])
//));

Router::load('../config/routes.php')
    ->direct(Request::uri(), Request::methodType());
