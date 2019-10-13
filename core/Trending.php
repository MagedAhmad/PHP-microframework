<?php


namespace App\Core;


class Trending
{


    public static function fetch($language, $since) {

        $url = self::url($language, $since);
        $content = file_get_contents($url);
        return json_decode($content);
    }

    private static function url($language, $since) {
        return "https://github-trending-api.now.sh/repositories?language=".$language."&since=". $since;
    }


}