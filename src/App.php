<?php

namespace TrendingRepos;

use TrendingRepos\Exception\RouterException;
use TrendingRepos\Core\Request;
use TrendingRepos\Core\Router;
use TrendingRepos\Core\Page;

class App 
{
    protected $environment = 'development';
    public $registry = [];
    protected $router;
    
    public function __construct()
    {
        $this->setErrorReporting();
        $this->loadConfigFile();  
        $this->loadRouter();  
    }

    public function run()
    {
        try {
            $this->router->get();
        }catch(RouterException $e) {
            echo (new Page)->view('404', [
                'error' => $e->getMessage()
            ]);
        }catch(\Exception $e) {
            echo (new Page)->view('404', [
                'error' => $e->getMessage()
            ]);
        }
    }

    public function setErrorReporting()
    {
        ini_set('error_reporting', E_ALL);
        
        ini_set('display_errors', $this->environment == 'development' ? 'On' : 'Off');
    }

    public function loadConfigFile()
    {
        $this->registry['config'] = require '../config/config.php'; 
    }

    public function loadRouter()
    {
        $this->registry['routes'] = require '../config/routes.php';

        $this->router = new Router($this->registry['routes'], new Request);
    }
}
