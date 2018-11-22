<?php

namespace Anax\Models;

class IpStackApi
{
    private $access_key = "5686e1efb6449aa0e41c16edbd95e12d";

    function getGeo($ip)
    {
        $ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key='.$this->access_key.'');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);
        curl_close($ch);

        return json_decode($json, true);
    }

}
