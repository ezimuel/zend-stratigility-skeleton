<?php

namespace App\Test\Action;

use PHPUnit_Framework_TestCase as TestCase;
use App\Action\Homepage;
use League\Plates\Engine as Template;
use Zend\Diactoros\Request;
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
        $homepage = new Homepage(new Template(__DIR__ . '/../../template'));
        $response = $homepage(new Request('/'), new Response(), null);

        $this->assertTrue($response instanceof Response);
        $this->assertNotEmpty($response->getBody());
    }

    public function testHomepageWrongUri()
    {
        $homepage = new Homepage(new Template(__DIR__ . '/../../template'));
        $result = $homepage(new Request('/wrong-url'), new Response(), function(){
            return false;
        });
        
        $this->assertFalse($result);
    }
}
