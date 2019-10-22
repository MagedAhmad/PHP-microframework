<?php


return [
    'database' => [
    'name' => 'dbname',
    'username' => 'root',
    'password' => 'ENTER-YOUR-PASSWORD',
    'connection' => 'mysql:host=localhost',
    'options' => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ],

    'Api' => [
    'provider' => 'github',
    'language' => 'PHP',
    'since' => 'weekly'
    ]
  ]

];
