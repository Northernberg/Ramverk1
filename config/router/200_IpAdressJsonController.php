<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Ip-adress validor REST",
            "mount" => "myIpValidator/",
            "path" => null,
            "handler" => "\Anax\IpAdressValidator\IpAdressJsonController",
        ],
    ]
];
