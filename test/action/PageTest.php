<?php

namespace App\Test\Action;

use PHPUnit_Framework_TestCase as TestCase;
use App\Action\Page;
use League\Plates\Engine as Template;
use Zend\Diactoros\Request;
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
        $page = new Page(new Template(__DIR__ . '/../../template'));
        $response = $page(new Request('/page'), new Response(), null);

        $this->assertTrue($response instanceof Response);
        $this->assertNotEmpty($response->getBody());
    }
}
