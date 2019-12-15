<?php

namespace TrendingRepos;

use TrendingRepos\Exception\RouterException;
use TrendingRepos\Core\Request;
use TrendingRepos\Core\Router;

class App 
{
    public $registry = [];
    private $environment = 'development';
    private $router;

    public function __construct()
    {
        $this->setErrorReporting();
        $this->loadConfigFile();  
        $this->loadRouter();  
    }

    public function run()
    {
        try {
            $this->router->get($this);
        }catch(RouterException $e) {
            view('404', [
                'error' => $e->getMessage()
            ]);
        }
    }

    private function setErrorReporting()
    {
        ini_set('error_reporting', E_ALL);
        
        ini_set('display_errors', $this->environment == 'development' ? 'On' : 'Off');
    }

    private function loadConfigFile()
    {
        $this->registry['config'] = require '../config/config.php'; 
    }

    private function loadRouter()
    {
        $this->registry['routes'] = require '../config/routes.php';

        $this->router = new Router($this->registry['routes'], new Request());
    }
}
