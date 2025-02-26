<?php

//if uninstall not called from WordPress exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) )
    exit();

defined( 'FIVESTER_INVITE_SLUG__' ) || define( 'FIVESTER_INVITE_SLUG__', '_fivester_invite' );

$opts   = wp_load_alloptions();
foreach( $opts as $key => $value ){
    if( strpos( $key, FIVESTER_INVITE_SLUG__ ) === 0 ) {
        delete_option( $key );
    }
}