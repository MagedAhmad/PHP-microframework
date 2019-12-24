<?php

namespace TrendingRepos\Core;

class Flash extends Session
{
    public function setSuccess(string $message)
    {
        $this->set('success', $message);
    }

    public function setDanger(string $message)
    {
        $this->set('danger', $message);
    }

    public function setInfo(string $message)
    {
        $this->set('info', $message);
    }
}
