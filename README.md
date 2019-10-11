# PHP-Microframework
A micro PHP-OOP framework, follows mvc pattern . 

## Installation

* Rename .config.Example.php to .config.php
* Enter your database info in .config.php

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

Hint: Project still not ready for deployment purposes. 

