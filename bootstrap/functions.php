<?php

function filterInput($input, $lowercase = false) {

    if($lowercase) {
        return strtolower(  stripslashes( htmlspecialchars($input) ) );
    }

    return stripslashes( htmlspecialchars($input) );
}


function rrmdir($directory, $delete = false)
{
    $contents = glob($directory . '*');
    foreach($contents as $item)
    {
        if (is_dir($item))
            rrmdir($item . '/', true);
        else
            unlink($item);
    }
    if ($delete === true)
        rmdir($directory);
}

function getIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

function getCountryByIp($ip) {
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
echo $details->country;
}

function lastVisit() {
 
    $inTwoMonths = 60 * 60 * 24 * 60 + time();
    return setcookie('session_visit', date("H:i - m/d/y"), $inTwoMonths);
}

// returns true if $needle is a substring of $haystack
function contains($needle, $haystack)
{
    return strpos($haystack, $needle) !== false;
}
