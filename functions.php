<?php

function view(string $page, array $templateVars = []) {
    extract($templateVars);
    
    require "views/{$page}.view.php";
}

function dd($arg) {
    die(var_dump($arg));
}
