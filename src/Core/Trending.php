<?php

namespace TrendingRepos\Core;

class Trending
{
    protected static $providers = [
      'github',
      'gitlab',
      'bitbucket'
    ];

    public static function fetch(array $args) 
    {
       $url = self::url($args);
       $content = file_get_contents($url);

       return json_decode($content);
    }

    public static function FetchLanguages() 
    {
        $content = file_get_contents("https://github-trending-api.now.sh/languages");

        return json_decode($content);
    }

    public static function FetchProviders(): array
    {
        return self::$providers;
    }

    public static function url($args): string
    {
        return "https://". $args['provider'] ."-trending-api.now.sh/repositories?language=".$args['language']."&since=". $args['since'];
    }
}
