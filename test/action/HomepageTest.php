<?php

namespace App\Test\Action;

use PHPUnit_Framework_TestCase as TestCase;
use App\Action\Homepage;
use League\Plates\Engine as Template;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response;

class HomepageTest extends TestCase
{
    public function testConstructor()
    {
        $homepage = new Homepage(new Template());
        $this->assertTrue($homepage instanceof Homepage);
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testConstructorError()
    {
        $homepage = new Homepage();
    }

    public function testHomepageResponse()
    {
        $template = new Template(__DIR__ . '/../../template');
        $homepage = new Homepage($template);
        $response = $homepage(new ServerRequest(['/']), new Response(), function () {
        });

        $this->assertTrue($response instanceof Response);
        $this->assertEquals($template->render('home'), (string) $response->getBody());
    }
}
