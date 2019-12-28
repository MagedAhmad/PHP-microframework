<?php

namespace TrendingRepos\Controller;

use TrendingRepos\Core\Paginator;
use TrendingRepos\Core\Trending;

class HomeController extends Controller 
{
    public function home()
    {
        $content = (new Trending())->fetch($this->getArgs());
        $offset = $_GET['offset'] ?? $this->config['offset'];
        $paginator = new Paginator();
        $repos = $paginator->get($content, $offset);

        return view('index', [
            'repos' => $repos,
            'paginator' => $paginator,
            'args' => $this->getArgs(),
            'providers' => $this->config['providers']
        ]);
    }

    private function getArgs(): array
    {
        $api =  $this->config['Api'];
        $provider = $_GET['provider'] ?? $api['provider'];
        $language = $_GET['language'] ?? $api['language'];
        $since = $_GET['since'] ?? $api['since'];

        return [
        	'provider' => $provider, 
        	'language' => $language, 
        	'since' => $since
        ];
    }
}
