<?php

namespace TrendingRepos\Core;

class Session {
    public function __construct()
    {
        if(!$this->isStarted())
        { 
            session_start(); 
        } 
    }

    public function set(string $key, string $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get(string $key): ?string
    {
        return $this->has($key) ? $_SESSION[$key] : null;
    }

    public function getAll()
    {
        return $_SESSION;
    }

    public function has(string $key): bool
    {
        if (empty($_SESSION)) {
            return false;
        }

        return array_key_exists($key, $_SESSION);
    }

    public function unset(string $key) 
    {
        if(!$this->has($key)) {
            return;
        }

        unset($_SESSION['counter']);
    }
    
    private function isStarted(): bool
    {
        return session_status() === PHP_SESSION_ACTIVE;
    }
}
