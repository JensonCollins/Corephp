<?php

define('ENV', 'development');

function is_https()
{
    if ( ! empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off')
    {
        return TRUE;
    }
    elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https')
    {
        return TRUE;
    }
    elseif ( ! empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off')
    {
        return TRUE;
    }

    return FALSE;
}

function base_url() {
    if (isset($_SERVER['SERVER_ADDR']))
    {
        if (strpos($_SERVER['SERVER_ADDR'], ':') !== FALSE)
        {
            $server_addr = '['.$_SERVER['SERVER_ADDR'].']';
        }
        else
        {
            $server_addr = $_SERVER['SERVER_ADDR'];
        }

        $base_url = (is_https() ? 'https' : 'http').'://'.$server_addr.substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_FILENAME'])));
    }
    else
    {
        $base_url = 'http://localhost/';
    }
    return "http://127.0.0.1:99/";
}

switch (ENV) {
    case 'development':
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        break;

    case 'testing':
    case 'production':
        ini_set('display_errors', 0);
        if (version_compare(PHP_VERSION, '5.3', '>=')) {
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
        } else {
            error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
        }
        break;

    default:
        header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
        echo 'The application environment is not set correctly.';
        exit(1); // EXIT_ERROR
}