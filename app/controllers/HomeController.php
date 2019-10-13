<?php

namespace App\Controllers;

use App\Core\App;

use App\Core\Trending;

class HomeController {

    public function home(){

        $users = App::get('database')->selectAll('names');

        $repos = Trending::fetch('php', 'weekly');

        return view('index', compact('users', 'repos'));
    }




}