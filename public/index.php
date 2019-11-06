<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');

use App\Core\Router;
use App\Core\Request;

require '../vendor/autoload.php';

require '../core/bootstrap.php';

Router::load('../app/routes.php')
    ->direct(Request::uri(), Request::methodType());