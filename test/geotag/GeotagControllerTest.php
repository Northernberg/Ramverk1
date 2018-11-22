<?php

namespace Anax\geotag;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class GeotagControllerTest extends TestCase
{
    // Create the di container.
    protected $di;
    protected $controller;

    /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new geotagController();
        $this->controller->setDI($this->di);
        $this->controller->initialize();
    }

    /**
     * Test the route "index".
     */
    public function testIndexAction()
    {
        $res = $this->controller->indexAction();
        $this->assertInstanceOf("\Anax\Response\Response", $res);
    }

    /**
     * Test the route "index".
     */
    public function testIndexPostAction()
    {
        $this->di->get("request")->setPost("ip-adress", "255.255.255.255");
        $ip = $this->di->get("request")->getPost("ip-adress");
        $this->assertEquals($ip, "255.255.255.255");

        $res = $this->controller->indexActionPost();
        $this->assertInstanceOf("\Anax\Response\Response", $res);
    }
}
