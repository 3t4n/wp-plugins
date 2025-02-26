<?php
/*

uninstall.php

- fires when plugin is uninstalled via the Plugins screen

*/

// exit if uninstall costant is not defined
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {

	exit;

}


// delete the plugin options
delete_option( 'flipdish_ordering_options' );
delete_option( 'FLIPDISH_ORDERING_VERSION' );
