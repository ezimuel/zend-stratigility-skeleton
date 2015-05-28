<?php
/**
 * Skeleton application based on zend-stratigility
 * for general purpose PHP web application based on middleware and PSR-7
 *
 * @author Enrico Zimuel (enrico@zend.com)
 */

use Zend\Stratigility\MiddlewarePipe;
use Zend\Diactoros\Server;
use League\Plates\Engine as Template;

require '../vendor/autoload.php';

$app = new MiddlewarePipe();
$template = new Template(dirname(__DIR__) . '/template');

// Homepage
$app->pipe('/', function ($req, $res, $next) use ($template) {
    $action = new App\Action\Homepage($template);
    return $action($req, $res, $next);
});

// Another page
$app->pipe('/page', function ($req, $res, $next) use ($template) {
    $action = new App\Action\Page($template);
    return $action($req, $res, $next);
});

$server = Server::createServer($app, $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);
$server->listen();
