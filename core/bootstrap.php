<?php

use App\Core\App;

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
   Connection::make(App::get('config')['database'])
));


function view($page, $data = []) {
    extract($data);
    require "app/views/{$page}.view.php";
}

