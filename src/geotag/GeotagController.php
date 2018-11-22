<?php

namespace Anax\geotag;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Anax\Models\IpStackApi;
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
class GeotagController implements ContainerInjectableInterface
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
    public function indexAction() : object
    {
        $title = "Geotag";

        $page = $this->di->get("page");

        $page->add("anax/geo/index", [
            "default" => $this->di->get("request")->getServer("REMOTE_ADDR"),
        ]);

        return $page->render([
            "title" => $title,
        ]);
    }

    /**
     * Update current selected style.
     *
     * @return object
     */
    public function indexActionPost() : object
    {
        $title = "Ip adress";

        $ipStack = new IpStackApi();
        $validator = new IpAdressValidator();
        $page = $this->di->get("page");
        $request = $this->di->get("request");
        $ip_adress = $request->getPost("ip-adress");
        $geotag = null;

        if ($validator->validateIp($ip_adress)) {
            $geotag = $ipStack->getGeo($ip_adress);
        }

        $page->add("anax/geo/result", [
            "geo" => $geotag,
        ]);

        return $page->render([
            "title" => $title,
        ]);
    }
}
