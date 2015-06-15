<?php
/**
 * Homepage action
 *
 * @author Enrico Zimuel (enrico@zend.com)
 */
namespace App\Action;

use League\Plates\Engine as Template;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class Homepage
{
    public function __construct(Template $template)
    {
        $this->template = $template;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        $response->getBody()->write($this->template->render('home'));
        return $response;
    }
}
