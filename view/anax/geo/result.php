<?php

namespace Anax\View;

/**
 * Style chooser.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());



?>

<?php if (isset($geo)) : ?>
    <h1>Ip-adress</h1>

    <p> Ip-Adress: <?= $geo["ip"] ?> </p>
    <p> Type: <?= $geo["type"] ?> </p>
    <p> City: <?= $geo["country_name"] ?> </p>
    <p> Latitude: <?= $geo["latitude"] ?> </p>
    <p> Longitude <?= $geo["longitude"] ?> </p>
<?php else : ?>
    <p> Not valid ip </p>
<?php endif; ?>
