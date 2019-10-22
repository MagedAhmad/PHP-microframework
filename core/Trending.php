<?php


namespace App\Core;


class Trending
{

    protected static $providers = [
      'github',
      'gitlab',
      'bitbucket'
    ];

    public static function fetch($args) {
       $url = self::url($args);
       $content = file_get_contents($url);
       return json_decode($content);

    }

    public static function FetchLanguages() {
        $content = file_get_contents("https://github-trending-api.now.sh/languages");
        return json_decode($content);
    }

    public static function FetchProviders() {
        return self::$providers;
    }


    public static function url($args) {
        return "https://". $args['provider'] ."-trending-api.now.sh/repositories?language=".$args['language']."&since=". $args['since'];
    }





}