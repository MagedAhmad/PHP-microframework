<?php

namespace App\Controllers;

use App\Core\App;

use App\Core\Paginator;
use App\Core\Trending;

class HomeController {

    public function home(){
        $language = (isset($_GET['language'])) ? $_GET['language'] : 'php';
        $since = (isset($_GET['since'])) ? $_GET['since'] : 'weekly';
        $paginate = (isset($_GET['paginate'])) ? $_GET['paginate'] : 10;


        $repos = Trending::fetch($language, $since);
        $languages = Trending::FetchLanguages();
        $paginator = new Paginator();
        $repos = $paginator->get($repos, $paginate);

        return view('index', compact('repos', 'paginator', 'languages'));

    }




}