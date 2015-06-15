<?php

namespace App\Test\Action;

use PHPUnit_Framework_TestCase as TestCase;
use App\Action\PageFactory;
use League\Plates\Engine as Template;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response;

class PageFactoryTest extends TestCase
{
    public function testFactory()
    {
        $response = PageFactory::factory(new ServerRequest, new Response, function () {
        });
        $this->assertTrue($response instanceof Response);

        $template = new Template(__DIR__ . '/../../template');
        $this->assertEquals(
            $template->render('page', [ 'value' => 'This is a test page!']),
            (string) $response->getBody()
        );
    }
}
