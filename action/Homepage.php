<?php
/**
 * Homepage action
 *
 * @author Enrico Zimuel (enrico@zend.com)
 */
namespace App\Action;

use League\Plates\Engine as Template;

class Homepage
{
    public function __construct(Template $template)
    {
        $this->template = $template;
    }

    public function __invoke($request, $response, $next)
    {
        if ($request->getUri()->getPath() !== '/') {
            return $next($request, $response);
        }
        $response->getBody()->write($this->template->render('home'));
        return $response;
    }
}
