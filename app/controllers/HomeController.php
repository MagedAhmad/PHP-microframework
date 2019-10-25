<?php

namespace App\Controllers;

use App\Core\App;

use App\Core\Paginator;
use App\Core\Trending;

class HomeController {


    public function home(){

    	// Get trending repositories
    	$args = $this->getArgs();
        $repos = Trending::fetch($args);

        // pagination
        $offset = (isset($_GET['offset'])) ? $_GET['offset'] : 10;
        $paginator = new Paginator();
        $repos = $paginator->get($repos, $offset);

        return view('index', compact('repos', 'paginator', 'args'));

    }

    /*
    * Get Trending Arguments 
    * Provider - Language - Since 
    * 
    * return array
    */
    public function getArgs() {

        $config =  App::get('config')['Api'];

        $provider = (isset($_GET['provider'])) ? $_GET['provider'] : $config['provider'];
        $language = (isset($_GET['language'])) ? $_GET['language'] :  $config['language'];
        $since = (isset($_GET['since'])) ? $_GET['since'] : $config['since'];

        return [
        	'provider' => $provider, 
        	'language' => $language, 
        	'since' => $since
        ];
    }






}