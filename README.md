# stratigility-skeleton

This is a proposal for a middleware skeleton application based on
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

To run the skeleton application you need to expose the `/public` folder using a
web server. You can also use the PHP internal web server running the
following command:

```
php -S 0.0.0.0:8000 -t public
```

You can see the application opening a browser to `http://localhost:8000`.
