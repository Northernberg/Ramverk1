<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Ip-Adress Validator",
            "mount" => "ip",
            "handler" => "\Anax\IpAdressValidator\IpAdressController",
        ],
    ]
];
