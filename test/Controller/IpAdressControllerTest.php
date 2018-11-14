<?php

namespace Anax\IpAdressValidator;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class IpAdressControllerTest extends TestCase
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
        $this->controller = new IpAdressController();
        $this->controller->setDI($this->di);
        $this->controller->initialize();
    }

    /**
     * Test the route "index".
     */
    public function testIndexGetAction()
    {
        $res = $this->controller->indexActionGet();
        $this->assertInstanceOf("\Anax\Response\Response", $res);
    }

    /**
     * Test the route "index".
     */
    public function testIndexPostAction()
    {
        $this->di->get("request")->setPost("ip-adress", "255.255.255.255");
        $ipv4 = $this->di->get("request")->getPost("ip-adress");
        $this->assertEquals($ipv4, "255.255.255.255");

        $res = $this->controller->indexActionPost();
        $this->assertInstanceOf("\Anax\Response\Response", $res);
    }

    public function testIpv6PostAction()
    {
        $this->di->get("request")->setPost("ip-adress", "2001:db8:a0b:12f0::1");
        $ipv6 = $this->di->get("request")->getPost("ip-adress");
        $this->controller->indexActionPost();
        $this->assertEquals($ipv6, "2001:db8:a0b:12f0::1");
    }
}
