<?php

namespace TrendingRepos\Exceptions;

use Exception;

class RouterException extends Exception {
    protected $msg;

    public function __construct(string $msg)
    {
        $this->msg = $msg;
    }

    public function getErrorMsg()
    {
        $errors[] = $this->msg;

        return view('404', $errors);
    }
}
