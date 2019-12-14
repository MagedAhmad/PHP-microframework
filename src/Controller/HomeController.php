<?php

namespace TrendingRepos\Controller;

use TrendingRepos\App;
use TrendingRepos\Core\Paginator;
use TrendingRepos\Core\Trending;
use TrendingRepos\Core\Page;

class HomeController 
{
    public function home()
    {
        $content = Trending::fetch($this->getArgs());
        $offset = $_GET['offset'] ?? (new App)->registry['config']['offset'];
        $paginator = new Paginator;
        $repos = $paginator->get($content, $offset);
        
        echo (new Page())->view('index', [
            'repos' => $repos,
            'paginator' => $paginator,
            'args' => $this->getArgs()
        ]);
    }

    public function getArgs(): array
    {
        $config =  (new App)->registry['config']['Api'];
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
