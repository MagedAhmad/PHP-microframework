<?php

namespace TrendingRepos\Controller;

use TrendingRepos\App;
use TrendingRepos\Core\Paginator;
use TrendingRepos\Core\Trending;

class HomeController {
    public function home(){
        $content = Trending::fetch($this->getArgs());
        $offset = (isset($_GET['offset'])) ? $_GET['offset'] : 10;
        $paginator = new Paginator;
        $repos = $paginator->get($content, $offset);

        return view('index', [
            'repos' => $repos,
            'paginator' => $paginator,
            'args' => $this->getArgs()
        ]);
    }

    public function getArgs() {
        $config =  App::get('config')['Api'];
        $provider = (isset($_GET['provider'])) ? $_GET['provider'] : $config['provider'];
        $language = (isset($_GET['language'])) ? $_GET['language'] :  $config['language'];
        $since = (isset($_GET['since'])) ? $_GET['since'] : $config['since'];

        return [
        	'provider' => $provider, 
        	'language' => $language, 
        	'since' => $since
        ];
    }
}
