<?php
/*
Plugin Name: Persian Date
Plugin URI: https://wordpress.org/plugins/persian-date/
Description: تاریخ شمسی برای وردپرس
Version: 0.1.3
Author: MahdiY
Author URI: http://MahdiY.ir
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! defined( 'PD_VERSION' ) ) {
	define( 'PD_VERSION', '0.1.3' );
}

if ( ! defined( 'PD_PLUGIN_FILE' ) ) {
	define( 'PD_PLUGIN_FILE', __FILE__ );
}

require_once 'vendor/autoload.php';
require_once 'includes/class-pd.php';
require_once 'includes/class-admin.php';

function PD() {
	return PD::instance();
}

PD();