<?php

/*
* Plugin Name: Local Time
* Author: Michael Espiritu
* Description: JS Based time that can be display in any page or post using [melt_localtime] shortcode.
* Version: 1.0
* License: GPLv2 or later
*/


//Exit if access directly
if( !defined('ABSPATH') ){

  exit;

}


if ( ! defined( 'MELT_LOCALTIME_DIR' ) ) {

	define( 'MELT_LOCALTIME_DIR', dirname( __FILE__ ) );

}


require_once MELT_LOCALTIME_DIR . '/includes/get-melt-time.php';
require_once MELT_LOCALTIME_DIR . '/includes/get-melt-admin-bar.php';
require_once MELT_LOCALTIME_DIR . '/includes/get-melt-enqueue.php';
