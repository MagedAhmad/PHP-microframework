<?php


namespace App\Core;


class Trending
{

    public static function fetch($language = "php", $since = "weekly") {
       $url = self::url($language, $since);
       $content = file_get_contents($url);
       return json_decode($content);

    }

    public static function FetchLanguages() {
        $content = file_get_contents("https://github-trending-api.now.sh/languages");
        return json_decode($content);
    }



    public static function url($language, $since) {
        return "https://github-trending-api.now.sh/repositories?language=".$language."&since=". $since;
    }





}