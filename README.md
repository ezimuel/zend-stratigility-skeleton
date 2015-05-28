# zend-stratigility-skeleton

This is a proposal for a middleware PHP web application based on
[zend-stratigility](https://github.com/zendframework/zend-stratigility) component.

Install the skeleton
====================

To install the skeleton application you need to execute the composer install
command:

```
php composer.phar install
```

Run the skeleton
================

To run the skeleton application you need to publish the `/public` folder using a
web server. You can also use the PHP internal web server running the
following command:

```
php -S 0.0.0.0:8000 -t public
```

You can see the application running in a browser at `http://localhost:8000`.


The architecture of the skeleton application
============================================

This skeleton application combine a middleware approach, to manage request and
response, with the model [Action-Domain-Responder](http://pmjones.io/adr/)
proposed by [Paul M. Jones](https://github.com/pmjones).
