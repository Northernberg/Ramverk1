<?php

namespace Anax\View;

/**
 * Style chooser.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());



?><h1>Find your geo-location</h1>


<form class="stylechooser" method="post">
    <fieldset>
        <legend>Geo-location</legend>
        <p>
            <label for="ip-adress">Ip-adress: <br>
                <input type="text" name="ip-adress" value="<?= $default ?>">
            </label>
        </p>
        <p>
            <input type="submit" value="Submit">
        </p>
    </fieldset>
</form>

<p> RESTFUL API for geo-location validator </p>
<p> To send a ip-adress as GET you post to the route /myIpValidator/"ip-adress" </p>

<ul>
    <li><a href="myGeoValidator/geo/2607:f0d0:1002:51::4">Ipv6 Example </a></li>
    <li><a href="myGeoValidator/geo/132.248.10.7">Mexico Ipv4 example </a></li>
    <li><a href="myGeoValidator/geo/80.78.216.73">Sweden Ipv4 example</a></li>
</ul>
