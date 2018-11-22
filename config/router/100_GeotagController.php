<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Geotag",
            "mount" => "geotag",
            "handler" => "\Anax\geotag\GeotagController",
        ],
    ]
];
