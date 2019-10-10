<?php

namespace App\Controllers;

use App\Core\App;

class PagesController {

    public function home(){
        $users = App::get('database')->selectAll('names');
        return view('index', compact('users'));
    }

    public function about() {
        return view('about');
    }

    public function profile(){
        return view('profile');
    }


}