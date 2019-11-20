<?php

function view($page, $data = []) {
    extract($data);
    require "views/{$page}.view.php";
}

function dd($arg) {
    die(var_dump($arg));
}
