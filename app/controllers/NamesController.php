<?php

namespace App\Controllers;
use App\Core\App;


class NamesController {

    public function store() {
        App::get('database')->insert('names', [
            'name' => $_POST['name'],
        ]);

        header('Location: /');
    }
}

