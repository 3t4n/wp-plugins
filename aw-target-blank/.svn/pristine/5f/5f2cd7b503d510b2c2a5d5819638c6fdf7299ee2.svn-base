<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$plugin_data = get_file_data(AWTB_PLUGIN_FILE, array('Plugin Name'=>'Plugin Name', 'Version'=>'Version'));
if ( ! defined( 'AWTB_PLUGIN_NAME' ) ) {
	define( 'AWTB_PLUGIN_NAME', $plugin_data['Plugin Name'] );
}
if ( ! defined( 'AWTB_PLUGIN_VERSION' ) ) {
	define( 'AWTB_PLUGIN_VERSION', $plugin_data['Version'] );
}
if ( ! defined( 'AWTB_PLUGIN_DIR' ) ) {
	define( 'AWTB_PLUGIN_DIR', dirname(AWTB_PLUGIN_FILE) );
}
/* Mapify General */




if(!@include_once('core.php')) {
include_once('core.php');
}
if(!@include_once('main.php')) {
include_once('main.php');
}

