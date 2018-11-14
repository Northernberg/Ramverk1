<?php

namespace Anax\View;

/**
 * Style chooser.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());



?><h1>Ip-adress validator</h1>

<form class="stylechooser" method="post">
    <fieldset>
        <legend>Ip adress validator</legend>
        <p>
            <label for="ip-adress">Ip-adress: <br>
                <input type="text" name="ip-adress">
            </label>
        </p>
        <p>
            <input type="submit" value="Submit">
        </p>
    </fieldset>
</form>

<p> RESTFUL API for ip-adress validator </p>
<p> To send a ip-adress as GET you post to the route /myIpValidator?id="ip-adress" </p>

<ul>
    <li><a href="myIpValidator/ip/155.135.55.94">Domain example </a></li>
    <li><a href="myIpValidator/ip/132.248.10.7">Domain example </a></li>
    <li><a href="myIpValidator/ip/80.78.216.73">IPV4 example</a></li>
    <li><a href="myIpValidator/ip/2001:db8:a0b:12f0::1">IPV6 example </a></li>
</ul>
