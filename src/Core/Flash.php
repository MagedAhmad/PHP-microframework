<?php

namespace TrendingRepos\Core;

class Flash {
    public static function set(string $type, string $message) {
        $_SESSION[$type] = $message;
    }

    public static function get(string $type) {
        echo !empty($_SESSION[$type]) ? $_SESSION[$type] : NULL;
    }

    public static function has(string $type) {
        return !empty($_SESSION[$type]) ? TRUE : FALSE;
    }
}
