<?php
defined( 'ABSPATH' ) or exit;
spl_autoload_register( 'mbo_autoload' );
function mbo_autoload( $class_name )
{
    if ( false === strpos( $class_name, 'Molongui\BumpOffer\\' ) ) return;
    if ( false !== strpos( $class_name, 'Molongui\BumpOffer\Pro\\' ) ) return;
    $file_parts = explode( '\\', $class_name );
    $part      = 1;
    $namespace = '';
    for ( $i = count( $file_parts ) - 1; $i > $part; $i-- )
    {
        $current = strtolower( $file_parts[ $i ] );
        $current = str_ireplace( '_', '-', $current );
        if ( count( $file_parts ) - 1 === $i )
        {
            $file_name = $current.'.php';
        }
        else $namespace = $current . '/' . $namespace;
    }
    $filepath  = MOLONGUI_BUMP_OFFER_DIR . $namespace ;
    $filepath .= $file_name;
    if ( file_exists( $filepath ) )
    {
        require_once $filepath;
    }
    else
    {

        wp_die( esc_html( "The file attempting to be loaded at $filepath does not exist." ) );
    }
}
