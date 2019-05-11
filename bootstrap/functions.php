<?php

function jsonToDebug($jsonText = '')
{
    $arr = json_decode($jsonText, true);
    $html = "";
    if ($arr && is_array($arr)) {
        $html .= htmlTable($arr);
    }
    return $html;
}

function htmlTable($array){
    // start table
    $html = '<table>';
    // header row
    $html .= '<tr>';
    foreach($array[0] as $key=>$value){
            $html .= '<th>' . htmlspecialchars($key) . '</th>';
        }
    $html .= '</tr>';

    // data rows
    foreach( $array as $key=>$value){
        $html .= '<tr>';
        foreach($value as $key2=>$value2){
            $html .= '<td>' . htmlspecialchars($value2) . '</td>';
        }
        $html .= '</tr>';
    }

    // finish table and return it

    $html .= '</table>';
    return $html;
}

function randomIP() {
    return long2ip(mt_rand());
}

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


function get_http_response_code($url) {
    $headers = get_headers($url);
    return substr($headers[0], 9, 3);
}


function getUserLocation() {
   $user_ip = getIP();

   if($user_ip) {
        $user_location = getLocationByIp($user_ip);
    }

    if($user_location) {
        return $user_location;
    } else {
        return $user_ip;
    }

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

        if ( ! filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) )
        {
            if(get_http_response_code("https://api.ipify.org") === "200"){
                $ip = file_get_contents('https://api.ipify.org');
            }
        }

    }

    return $ip;
}

function getLocationByIp($ip) {

    if(get_http_response_code("http://ipinfo.io/{$ip}") != "200"){
        return false;
    }

    $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));

    if(!$details->bogon) {
        return "{$details->city}, {$details->country}";
    }

    return false;

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
