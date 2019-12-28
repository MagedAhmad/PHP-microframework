<?php

namespace TrendingRepos;

use TrendingRepos\Exception\RouterException;
use TrendingRepos\Core\Request;
use TrendingRepos\Core\Router;

class App 
{
    private $registry = [];
    /** @var Obj Router Object */
    private $router;

    public function __construct()
    {
        $this->loadConfigFile();  
        $this->setErrorReporting();
        $this->loadRouter();  
    }

    public function getRegistry(): array
    {
        return $this->registry;
    }

    public function run()
    {
        try {
            $this->router->get();
        }catch(RouterException $e) {
            view('404', [
                'error' => $e->getMessage()
            ]);
        }
    }

    private function loadConfigFile()
    {
        $this->registry['config'] = require __DIR__ . '/../config/config.php'; 
    }

    private function setErrorReporting()
    {
        ini_set('error_reporting', E_ALL);
        
        ini_set('display_errors', $this->registry['config']['env'] ? 'On' : 'Off');
    }

    private function loadRouter()
    {
        $this->registry['routes'] = require __DIR__ . '/../config/routes.php';

        $this->router = new Router($this->registry['routes'], new Request());
    }
}
