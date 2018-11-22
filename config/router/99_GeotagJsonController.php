<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Geotag",
            "mount" => "myGeoValidator/",
            "path" => null,
            "handler" => "\Anax\geotag\GeotagJsonController",
        ],
    ]
];
