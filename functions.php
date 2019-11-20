<?php

function view($page, $errors = []) {
    extract($errors);
    require "views/{$page}.view.php";
}

function dd($arg) {
    die(var_dump($arg));
}
