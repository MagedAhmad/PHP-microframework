# PHP-Microframework [![Build Status](https://travis-ci.org/MagedAhmad/PHP-microframework.svg?branch=master)](https://travis-ci.org/MagedAhmad/PHP-microframework)
A micro PHP-OOP framework, follows mvc pattern . 

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
