<?php

namespace Anax\geotag;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Anax\Models\IpAdressValidator;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 * The controller will be injected with $di if implementing the interface
 * ContainerInjectableInterface, like this sample class does.
 * The controller is mounted on a particular route and can then handle all
 * requests for that mount point.
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class GeotagJsonController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;



    /**
     * @var string $db a sample member variable that gets initialised
     */
    private $db = "not active";



    /**
     * The initialize method is optional and will always be called before the
     * target method/action. This is a convienient method where you could
     * setup internal properties that are commonly used by several methods.
     *
     * @return void
     */
    public function initialize() : void
    {
        // Use to initialise member variables.
        $this->db = "active";
    }



    /**
     * Display the stylechooser with details on current selected style.
     *
     * @return object
     */
    public function geoAction($ipAdress) : array
    {
        $api = require ANAX_INSTALL_PATH . "/config/api_keys.php";
        $json = null;
        $curl = $this->di->get("curlwrap");
        $result = $curl->curl(["http://api.ipstack.com/" . $ipAdress . "?access_key=" . $api["geotag"]]);
        $validator = new IpAdressValidator();
        $geotag = null;

        if ($validator->validateIp($ipAdress)) {
            $geotag = $result[0];
        }

        $json = [
            "Ip-adress" => $geotag["ip"],
            "Type" => $geotag["type"],
            "Latitude" => $geotag["latitude"],
            "Longitude" => $geotag["longitude"],
            "Land" => $geotag["country_name"],
        ];

        return [$json];
    }
}
