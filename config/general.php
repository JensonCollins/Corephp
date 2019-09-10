<?php

function flag($code){

    $code = strtolower($code);

    if (strlen($code) == 2) {
        return '<img src="https://uploads.strikinglycdn.com/static/icons/country-flags-24/'.$code.'.png"/>  ';
    }else{
        return $code;
    }

}

function VisitorIP(){

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

    return clear($ip);
}

// kontrollon emailn nese eshte ok
function checkEmail($str)
{
    return preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $str);
}

//payment niddet
function _curl($url, $post = "", $sock, $usecookie = false)
{
    $ch = curl_init();
    if ($post) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    if (!empty($sock)) {
        curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
        curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
        curl_setopt($ch, CURLOPT_PROXY, $sock);
    }
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT,
        "Mozilla/6.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.7) Gecko/20050414 Firefox/1.0.3");
    if ($usecookie) {
        curl_setopt($ch, CURLOPT_COOKIEJAR, $usecookie);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $usecookie);
    }
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function get_string_between($string, $start, $end){
    $string = " " . $string;
    $ini = strpos($string, $start);
    if ($ini == 0)return "";
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

// Function for decryption
function dec2($data) {
    return strrev(base64_decode(base64_decode(base64_decode($data))));
}

// Function for encrypt
function enc2($data) {
    return base64_encode(base64_encode(base64_encode(strrev($data))));
}

function enc($data) {
    $outstring = '';
    $l = strlen($data);
    for ($i = 0; $i < $l; $i += 8) {
        $chunk = substr($data, $i, 8);
        $outlen = ceil((strlen($chunk) * 8)/6); //8bit/char in, 6bits/char out, round up
        $x = bin2hex($chunk);  //gmp won't convert from binary, so go via hex
        $w = gmp_strval(gmp_init(ltrim($x, '0'), 16), 62); //gmp doesn't likeh leading 0s
        $pad = str_pad($w, $outlen, '0', STR_PAD_LEFT);
        $outstring .= $pad;
    }
    return $outstring;
}

function dec($data) {
    $outstring = '';
    $l = strlen($data);
    for ($i = 0; $i < $l; $i += 11) {
        $chunk = substr($data, $i, 11);
        $outlen = floor((strlen($chunk) * 6)/8); //6bit/char in, 8bits/char out, round down
        $y = gmp_strval(gmp_init(ltrim($chunk, '0'), 62), 16); //gmp doesn't like leading 0s
        $pad = str_pad($y, $outlen * 2, '0', STR_PAD_LEFT); //double output length as as we're going via hex (4bits/char)
        $outstring .= pack('H*', $pad); //same as hex2bin
    }
    return $outstring;
}

function logged_in_redirect() {
    if (logged_in() === true) {

        die('<meta http-equiv="refresh" content="0; url=index.php" />');

    }
}

function output_errors($errors) {
    return  implode(' - ', $errors);
}


function logged_in(){
    return (isset($_SESSION['user_id'])) ? true : false;
}

//clear
function clear($string){

    global $db;
    $string = trim($string);
    $string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    $string = $db->real_escape_string($string);

    return $string;

}

function alert($message,$type = 'success'){
    //warning
    //danger
    //primary
    //success

    return '<script>
                $(document).ready(function() {
                    swal({
                        text: "'.$message.'",
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-'.$type.'",
                        type: "'.$type.'"
                    }).catch(swal.noop)
                });
            </script>';

    return '<div class="sufee-alert alert with-close alert-'.$type.' alert-dismissible fade show"> 
                     <center>'.$message.'</center>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div><br>';

}