<?php
defined( 'ABSPATH' ) or exit;
function mbo_setcookie( $name, $value, $expire, $path = '/', $domain = "", $secure = null, $httponly = false, $samesite = 'strict' )
{
    if ( is_null( $secure ) )
    {
        $secure = isset( $_SERVER['HTTPS'] ) ? $_SERVER['HTTPS'] !== 'off' : false;
    }
    if ( PHP_VERSION_ID < 70300 )
    {
        setcookie( $name, $value, $expire, $path.'; samesite='.$samesite, $domain, $secure, $httponly );
        return;
    }
    setcookie( $name, $value, array
    (
        'expires'  => $expire,
        'path'     => $path,
        'domain'   => $domain,
        'samesite' => $samesite,
        'secure'   => $secure,
        'httponly' => $httponly,
    ));
}