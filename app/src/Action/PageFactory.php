<?php
/**
 * Page factory
 *
 * @author Enrico Zimuel (enrico@zend.com)
 */
namespace App\Action;

use League\Plates\Engine as Template;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class PageFactory
{
    public static function factory(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        $action = new Page(new Template(__DIR__ . '/../../template'));
        return $action($request, $response, $next);
    }
}
