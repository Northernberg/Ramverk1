<?php

namespace Anax\View;

?><h1>Ip-adress JSON validator</h1>

<form class="stylechooser" method="post">
    <fieldset>
        <legend>Ip adress JSON</legend>
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

<p> <?= json_encode($json, JSON_PRETTY_PRINT) ?> </p>
