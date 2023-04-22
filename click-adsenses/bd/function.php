<?php

function code()
{

    $ip = $_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    $visitor = $ip;

    $datocode = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=" . $visitor));

    // $code       = $datocode["geoplugin_countryCode"];
    // $pais       = $datocode["geoplugin_countryName"];
    // $region     = $datocode["geoplugin_city"];
    // $data = array('ip'=> $visitor, 'code'=> $code, 'pais'=> $pais, 'region'=> $region);

    return $datocode;
}
