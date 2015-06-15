<?php

namespace App\Test\Action;

use PHPUnit_Framework_TestCase as TestCase;
use App\Action\Page;
use League\Plates\Engine as Template;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response;

class PageTest extends TestCase
{
    public function testConstructor()
    {
        $page = new Page(new Template());
        $this->assertTrue($page instanceof Page);
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testConstructorError()
    {
        $page = new Page();
    }

    public function testPageResponse()
    {
        $template = new Template(__DIR__ . '/../../template');
        $homepage = new Page($template);
        $response = $homepage(new ServerRequest(['/page']), new Response(), function () {
        });

        $this->assertTrue($response instanceof Response);
        $this->assertEquals(
            $template->render('page', [ 'value' => 'This is a test page!']),
            (string) $response->getBody()
        );
    }
}
