<?php


function view($page, $data = []) {
    extract($data);
    require "../app/views/{$page}.view.php";
}


function dd($arg) {
    die(var_dump($arg));
}
