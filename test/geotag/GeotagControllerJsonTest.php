<?php

namespace Anax\geotag;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class GeotagControllerJsonTest extends TestCase
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
        $this->controller = new geotagJsonController();
        $this->controller->setDI($this->di);
        $this->controller->initialize();
    }

    /**
     * Test the route "index".
     */
    public function testGeoAction()
    {
        $this->di->get("request")->setPost("ip-adress", "255.255.255.255");
        $ipAdress = $this->di->get("request")->getPost("ip-adress");
        $this->assertEquals($ipAdress, "255.255.255.255");

        $this->controller->geoAction("255.255.255.255");
        // Test wrong ip
        $this->controller->geoAction("asd");
    }
}
