# zend-stratigility-skeleton

[![Build Status](https://travis-ci.org/ezimuel/zend-stratigility-skeleton.svg?branch=master)](https://travis-ci.org/ezimuel/zend-stratigility-skeleton)

This is a proposal for a middleware PHP skeleton application based on
[zend-stratigility](https://github.com/zendframework/zend-stratigility) component.

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


The architecture of the skeleton application
============================================

This skeleton application combine a middleware approach, to manage request and
response, with the [Action-Domain-Responder](http://pmjones.io/adr/) architecture
proposed by [Paul M. Jones](https://github.com/pmjones).

All the actions of the application are stored in the `action` folder and the
business logic (the model) is stored in the `domain` folder, that is empty in the
skeleton.

The views of the application, containing the HTML pages, are stored in the
`template` folder. For the views we used the [league/plates](https://github.com/thephpleague/plates)
library that facilitates the management using simple PHP files, without the needs
of a template language.

To manage the dependencies of the action classes we used the [Factory](https://en.wikipedia.org/wiki/Factory_method_pattern)
design pattern. Each action class has a `*Factory` component with a static `factory`
method.

The factory method creates the action instance with the dependencies passed in
the constructor. For instance, the [Homepage](action/Homepage.php) action, has the
dependecies of a `League\Plates\Engine` object (the Template). This dependency is
injected by the factory during the constructor of the Homepage.

Because all the actions are PSR-7 middleware compliant, we need to return a *callable*
or a *response*. In the case of `Factory` we return a callable, for the `Homepage` we
just return the response because we don't need to execute nothing more.
