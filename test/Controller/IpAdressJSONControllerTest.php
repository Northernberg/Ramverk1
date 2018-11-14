<?php

namespace Anax\IpAdressValidator;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class IpAdressJSONControllerTest extends TestCase
{
    /**
     * Properties
     */
    protected $di;
    protected $controller;



    /**
     * Set up a request object
     *
     * @return void
     */
    public function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new IpAdressJSONController();
        $this->controller->setDI($this->di);
        $this->controller->initialize();
    }
    /**
     * Test the route "index".
     */
    public function testIpAction()
    {
        // Test ipv4 and ipv6
        $res = $this->controller->ipActionGet("255.255.255.255");
        $this->controller->ipActionGet("2001:db8:a0b:12f0::1");

        $this->assertArrayHasKey("domain", $res[0]);
        $this->assertArrayHasKey("ip-adress", $res[0]);
        $this->assertArrayHasKey("type", $res[0]);
    }
}
