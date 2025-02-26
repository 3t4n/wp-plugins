<?php
/**
 * Plugin Name: AdminBar Remover
 * Plugin URI: http://www.sujinc.com/
 * Description: Hide and show the adminbar by clicking WP logo. It works on front pages only.
 * Version: 1.0.0
 * Author: Sujin 수진 Choi
 * Author URI: http://www.sujinc.com/
 * Text Domain: SJABR
 */

if ( !defined( "ABSPATH" ) ) {
	header( "Status: 403 Forbidden" );
	header( "HTTP/1.1 403 Forbidden" );
	exit();
}

# Constants
if ( !defined( "SJABR_PLUGIN_NAME" ) ) {
	$basename = trim( dirname( plugin_basename( __FILE__ ) ), "/" );
	if ( !is_dir( WP_PLUGIN_DIR . "/" . $basename ) ) {
		$basename = explode( "/", $basename );
		$basename = array_pop( $basename );
	}

	define( "SJABR_PLUGIN_NAME", $basename );
}

if ( !defined( "SJABR_PLUGIN_FILE_NAME" ) )
	define( "SJABR_PLUGIN_FILE_NAME", basename(__FILE__) );

if ( !defined( "SJABR_TEXTDOMAIN" ) )
	define( "SJABR_TEXTDOMAIN", "SJABR" );

if ( !defined( "SJABR_PLUGIN_DIR" ) )
	define( "SJABR_PLUGIN_DIR", WP_PLUGIN_DIR . "/" . SJABR_PLUGIN_NAME . "/" );

if ( !defined( "SJABR_PLUGIN_URL" ) )
	define( "SJABR_PLUGIN_URL", WP_PLUGIN_URL . "/" . SJABR_PLUGIN_NAME . "/" );

# Initialize
include_once( SJABR_PLUGIN_DIR . "autoload.php");
$GLOBALS[ 'SJABR' ] = new SJABR\Init();
