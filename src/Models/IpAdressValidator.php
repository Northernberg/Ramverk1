<?php

namespace Anax\Models;

class IpAdressValidator
{
    function getType($ip)
    {
        $type = null;
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $type = "IPV6";
        } elseif (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $type = "IPV4";
        }

        return $type;
    }

    function validateIp($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            return true;
        }
        return false;
    }

}
