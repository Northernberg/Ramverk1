<?php

namespace Anax\Models;

class IpAdressValidator
{
    public function getType($ipAdress)
    {
        $type = null;
        if (filter_var($ipAdress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $type = "IPV6";
        } elseif (filter_var($ipAdress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $type = "IPV4";
        }

        return $type;
    }

    public function validateIp($ipAdress)
    {
        if (filter_var($ipAdress, FILTER_VALIDATE_IP)) {
            return true;
        }
        return false;
    }
}
