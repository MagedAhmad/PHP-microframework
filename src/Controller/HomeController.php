<?php

namespace TrendingRepos\Controller;

use TrendingRepos\Core\Paginator;
use TrendingRepos\Core\Trending;

class HomeController extends Controller 
{
    public function home()
    {
        $content = Trending::fetch($this->getArgs());
        $offset = $_GET['offset'] ?? $this->registry['config']['offset'];
        $paginator = new Paginator();
        $repos = $paginator->get($content, $offset);

        return view('index', [
            'repos' => $repos,
            'paginator' => $paginator,
            'args' => $this->getArgs()
        ]);
    }

    public function getArgs(): array
    {
        $config =  $this->registry['config']['Api'];
        $provider = $_GET['provider'] ?? $config['provider'];
        $language = $_GET['language'] ?? $config['language'];
        $since = $_GET['since'] ?? $config['since'];

        return [
        	'provider' => $provider, 
        	'language' => $language, 
        	'since' => $since
        ];
    }
}
