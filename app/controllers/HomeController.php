<?php

namespace App\Controllers;

use App\Core\App;

use App\Core\Paginator;
use App\Core\Trending;

class HomeController {

    public function home(){

        $language = 'php';
        $since = 'weekly';
        $paginate = 10;

        if(isset($_GET['language'])) {

            $language = $_GET['language'];
            $since = $_GET['since'];
            $paginate = $_GET['paginate'];

        }

        $repos = Trending::fetch($language, $since);

        $languages = Trending::FetchLanguages();

        $paginator = new Paginator();

        $repos = $paginator->get($repos, $paginate);

        return view('index', compact('repos', 'paginator', 'languages'));

    }




}