<?php
/**
 * Proposal for a bootstrap of a middleware application
 * base on zend-stratigility component
 *
 * @author Enrico Zimuel (enrico@zend.com)
 */

use Zend\Stratigility\MiddlewarePipe;
use Zend\Diactoros\Server;
use Zend\Stratigility\Template;

require '../vendor/autoload.php';

define ('TEMPLATE_PATH', dirname(__DIR__) . '/template');

$app = new MiddlewarePipe();
$template = new Template();
$template->title = 'Skeleton application for zend-stratigility';

// Landing page
$app->pipe('/', function ($req, $res, $next) use ($template) {
    if ($req->getUri()->getPath() !== '/') {
        return $next($req, $res);
    }
    $template->setFileTemplate(TEMPLATE_PATH . '/home.php');
    $res->end($template->render());
});

// Another page
$app->pipe('/foo', function ($req, $res, $next) use ($template) {
    $template->setFileTemplate(TEMPLATE_PATH . '/foo.php');
    $res->end($template->render(['value' => 'Bar!']));
});

$server = Server::createServer($app, $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);
$server->listen();
