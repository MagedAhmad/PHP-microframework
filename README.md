# PHP-Microframework [![Build Status](https://travis-ci.org/MagedAhmad/PHP-microframework.svg?branch=master)](https://travis-ci.org/MagedAhmad/PHP-microframework)
A micro PHP-OOP framework, follows mvc pattern . 

## Installation

* Rename `config/.config.Example.php` to `config/.config.php`
* run `composer install`
* run `npm install`

You are ready to go ..

###### Routing 
in ``config\routes.php`` define your routes as :
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
php bin/console create:controller <controller-name>

````

this will create a controller in ``src/Controller/<controller-name>.php``


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
