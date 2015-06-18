# zend-stratigility-skeleton

[![Build Status](https://travis-ci.org/ezimuel/zend-stratigility-skeleton.svg?branch=master)](https://travis-ci.org/ezimuel/zend-stratigility-skeleton)

This is a skeleton proposal for a [PSR-7](http://www.php-fig.org/psr/psr-7/) based
middleware PHP application based on [zend-stratigility](https://github.com/zendframework/zend-stratigility)
component.

Install the skeleton
====================

To install the skeleton application you need to use [composer](https://getcomposer.org/).
If you don't have composer available on your system you can easily install it with
the following command:

```
curl -sS https://getcomposer.org/installer | php
```

or if you don't have [cURL](http://curl.haxx.se/) installed:

```
php -r "readfile('https://getcomposer.org/installer');" | php
```

Finally, you can install the skeleton dependecies using the following composer
command:

```
php composer.phar install
```

Run the skeleton application
============================

To run the skeleton application you need to publish the `/public` folder using a
web server. You can also use the PHP internal web server running the following
command:

```
php -S 0.0.0.0:8000 -t public
```

You can see the application running in a browser at `http://localhost:8000`.
The skeleton application is very simple, it contains only two static pages: the
homepage (`/`) and a general page (`/page`).

### Apache setup

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:

    <VirtualHost *:80>
        ServerName stratigility-skeleton.localhost
        DocumentRoot /path/to/stratigility-skeleton/public
        <Directory /path/to/stratigility-skeleton/public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
            <IfModule mod_authz_core.c>
            Require all granted
            </IfModule>
        </Directory>
    </VirtualHost>

### Nginx setup

To setup nginx, open your `/path/to/nginx/nginx.conf` and add an
[include directive](http://nginx.org/en/docs/ngx_core_module.html#include) below
into `http` block if it does not already exist:

    http {
        # ...
        include sites-enabled/*.conf;
    }


Create a virtual host configuration file for your project under `/path/to/nginx/sites-enabled/zf2-app.localhost.conf`
it should look something like below:

    server {
        listen       80;
        server_name  stratigility-skeleton.localhost;
        root         /path/to/stratigility-skeleton/public;

        location / {
            index index.php;
            try_files $uri $uri/ @php;
        }

        location @php {
            # Pass the PHP requests to FastCGI server (php-fpm) on 127.0.0.1:9000
            fastcgi_pass   127.0.0.1:9000;
            fastcgi_param  SCRIPT_FILENAME /path/to/stratigility-skeleton/public/index.php;
            include fastcgi_params;
        }
    }

Restart the nginx, now you should be ready to go!


The architecture of the skeleton application
============================================

This skeleton application uses a middleware approach, to manage HTTP request and
response. The application is stored inside the `/app` folder. This folder contains
a `config` directory, with the configuration files of the application, a
`template` directory, with the HTML templates of the application, and a
`src` directory, containing the source code of your application.

The `src` folder contains also a couple of sub-directories: `Action` and `Model`.
In the `Action` folder contains the actions of your application, the code to be
executed when a route is matched. If you are familiar with the
[Model–view–controller (MVC)](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller)
architecture, the actions acts like the Controller of your application.

The `Model` folder is an empty directory where you can put all the business logic
of your application. For instance, if you use and ORM like [Doctrine](http://www.doctrine-project.org/)
in your project you will put here all the Entities.

### The route configuration file

The route configuration file of the skeleton example is stored in `/app/config/route.php`.

In this example the configuration it's very simple and contains only two URLs: the homepage
(/) and a general page (/page).

```php
return [
    'routes' => [
        'home' => [
            'url' => '/',
            'action' => 'App\Action\HomepageFactory::factory'
        ],
        'page' => [
            'url' => '/foo',
            'action' => 'App\Action\PageFactory::factory'
        ]
    ]
];
```

This file is a simple PHP array containing the routes specified in the `routes` key.
Each route is specified by a name (home, page) containing a `url` and an `action`
value. The `url` specify the URL to match and the `action` is the code to be executed.

In the example, the actions are calls to static functions specified by a string name.
You can also specify a generic [callable](http://php.net/manual/en/language.types.callable.php)
type, e.g. an anonymous function, a name of a function, a name of an invokable class,
etc.

The route configuration reported in the skeleton example is quite simple and it
does not cover more interesting use cases like the usage of parameters in the URL.

For more information about the routing feature you can have a look at the
[zend-stratigility-dispatch](https://github.com/ezimuel/zend-stratigility-dispatch)
component used in the skeleton.

### The actions

All the actions are PSR-7 based middleware, that means they need to manage the
following signature:

```php
(ServerRequestInterface $request, ResponseInterface $response, callable $next)
```

and return a *callable* with `$next($request, $response)` or return a *response*
with `$response`. In the skeleton we provided two invokable classes `Homepage` and
`Page` that return a $response.

We used also factory classes to create the instance of the actions. We used the
[Factory design pattern](https://en.wikipedia.org/wiki/Factory_method_pattern) to
manage possible dependencies for the action, e.g. we injected a `Template` object
in the constructor of the action class using the factory.

If you are using a Container in your application that implements the standard
[Container Interoperability Interface](https://github.com/container-interop/container-interop/blob/master/src/Interop/Container/ContainerInterface.php)
you can use the object of the container as actions (you need only to specify
the object name in the `action` key of the route configuration and set the
container in the dispatcher, as reported [here](https://github.com/ezimuel/zend-stratigility-dispatch#using-a-container)
).


### The template system

The HTML pages of the application are stored in the `app/template` folder. These
pages are written using the [Plates](https://github.com/thephpleague/plates)
template library. This project is a template system that uses only PHP code,
without any additional template language.

In the skeleton we used a layout template file (app/template/layout.php) where
it's specified the HTML structure of the page. In the layout we specified the
portion of the page that will contain the *content* of a specific action.
This *content* view is specified using the PHP code:

```php
<?php echo $this->section('content') ?>
```
Each action has a specific template file, containing only the HTML portion of
interest.
