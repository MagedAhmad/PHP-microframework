# PHP-Microframework [![Build Status](https://travis-ci.org/MagedAhmad/PHP-microframework.svg?branch=master)](https://travis-ci.org/MagedAhmad/PHP-microframework)
A micro PHP-OOP framework, follows mvc pattern . 

## Installation

* Rename .config.Example.php to .config.php
* Enter your database info in .config.php
* run `composer install`
* run `npm install`

You are ready to go ..

###### Routing 
in ``app\routes.php`` define your routes as :
``````
$router->get('/', 'PagesController@home');
``````
you can specify that you want to trigger a post request as :
``````
$router->post('/users', 'UserController@store');
``````
###### Genrate controllers 

Using command line enter 
````
./project.php controller <controllername>
````

this will create a controller called ``app/controllers/<controllername>.php``


### Trending Repositories Feature

---


Languages supported are available using an api 
`https://github-trending-api.now.sh/languages`

Support 3 periods  `daily` , `weekly` , `monthly`

to get trending repos call
````
Trending::fetch($lanuage, $since);
````

For pagination u can use `Paginator` class.

``` 
$paginator = new Paginator();

$paginator->get($records, $limit);
```
