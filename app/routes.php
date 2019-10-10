<?php

$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('profile', 'PagesController@profile');

$router->post('names', 'NamesController@store');