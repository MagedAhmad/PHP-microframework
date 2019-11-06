<?php

use App\Core\App;


require_once 'Functions.php';

App::bind('config', require '../config.php');

ini_set('error_reporting', E_ALL);
ini_set('display_errors', App::get('config')['env'] == 'development' ? 'On' : 'Off');


App::bind('database', new QueryBuilder(
   Connection::make(App::get('config')['database'])
));



