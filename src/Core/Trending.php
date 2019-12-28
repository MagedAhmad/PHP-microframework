<?php

namespace TrendingRepos\Core;

class Trending
{
    public function fetch(array $args) 
    {
       $url = $this->url($args);
       $content = file_get_contents($url);

       return json_decode($content);
    }

    public function FetchLanguages() 
    {
        $content = file_get_contents("https://github-trending-api.now.sh/languages");

        return json_decode($content);
    }

    public function url($args): string
    {
        return "https://". $args['provider'] ."-trending-api.now.sh/repositories?language=".$args['language']."&since=". $args['since'];
    }
}
