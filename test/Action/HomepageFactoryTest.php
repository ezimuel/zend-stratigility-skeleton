<?php

namespace AppTest\Action;

use PHPUnit_Framework_TestCase as TestCase;
use App\Action\HomepageFactory;
use League\Plates\Engine as Template;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response;

class HomepageFactoryTest extends TestCase
{
    public function testFactory()
    {
        $response = HomepageFactory::factory(new ServerRequest, new Response, function () {
        });
        $this->assertTrue($response instanceof Response);

        $template = new Template(__DIR__ . '/../../app/template');
        $this->assertEquals($template->render('home'), (string) $response->getBody());
    }
}
