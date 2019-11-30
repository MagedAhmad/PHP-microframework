# TrendingRepos [![Build Status](https://travis-ci.org/MagedAhmad/TrendingRepos.svg?branch=master)](https://travis-ci.org/MagedAhmad/TrendingRepos)
A service to show trending repositories on any given provider, Used a custom micro PHP-OOP framework which follows mvc pattern. 

## Installation

* Rename `config/.config.Example.php` to `config/.config.php`
* Enter your database info in .config.php
* run `composer install`
* run `npm install`

You are ready to go ..

###### Routing 
define your routes in ``config\routes.php`` :
``````
$routes = [
            'GET' => [
                '/' => 'HomeController@home',
            ],
            'POST' => [],
          ];
``````
 
###### Genrate controllers 

Using command line enter 
````
php bin/console create:controller <controller-name>
````

this will create a controller in ``src/Controller/<controller-name>.php``

###### Genrate tests 

Using command line enter 
````
php bin/console create:test <testClass-name>
````

this will create a test in ``test/<testClass-name>.php``


### Trending Repositories Feature

---

Languages supported are available using this api 
`https://github-trending-api.now.sh/languages`

Support for 3 periods  `daily` , `weekly` , `monthly`

To get trending repos call
````
Trending::fetch($lanuage, $since);
````
For pagination u can use `Paginator` class.
``` 
$paginator = new Paginator();
$paginator->get($records, $limit);
```
