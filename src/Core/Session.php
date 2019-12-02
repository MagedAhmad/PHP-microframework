<?php

namespace TrendingRepos\Core;

class Session {
    public function __construct()
    {
        if($this->isStarted())
        { 
            session_start(); 
        } 
    }

    public function isStarted(): bool
    {
        return session_status() === PHP_SESSION_ACTIVE;
    }

    public function set(string $key, string $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get(string $key) 
    {
        return $this->has($key) ? $_SESSION[$key] : null;
    }

    public function all()
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

    public function destroy(string $key) 
    {
        if($this->has($key)) {
            unset($_SESSION['counter']);
        }
    }
}
