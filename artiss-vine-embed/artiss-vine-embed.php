<?php
/*
Plugin Name: Artiss Vine Embed
Plugin URI: http://wordpress.org/extend/plugins/artiss-vine-embed/
Description: Embed a Vine video into your blog
Version: 1.1.1
Author: David Artiss
Author URI: http://www.artiss.co.uk
*/

/**
* Artiss Vine Embed
*
* Main code - include various functions
*
* @package	Artiss-Vine-Embed
* @since	1.0
*/

define( 'artiss_vine_embed_version', '1.1.1' );

$functions_dir = WP_PLUGIN_DIR . '/artiss-vine-embed/includes/';

// Include all the various functions

if ( is_admin() ) {

	include_once( $functions_dir . 'set-admin-config.php' );			// Administration configuration

} else {

	include_once( $functions_dir . 'generate-embed-code.php' );			// Generate embed code

}

include_once( $functions_dir . 'shared-functions.php' );                // Shared functions

include_once( $functions_dir . 'generate-widgets.php' );                // Generate widgets

?>