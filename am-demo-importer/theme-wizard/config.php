<?php
/**
 * Settings for theme wizard
 *
 * @package Whizzie
 * @author Catapult Themes
 * @since 1.0.0
 */

/**
 * Define constants
 **/
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! defined( 'am_demo_importer_WHIZZIE_DIR' ) ) {
	define( 'am_demo_importer_WHIZZIE_DIR', dirname( __FILE__ ) );
}

// Classes for separate codes
require_once ADI_DIR . 'includes/setup_plugins.php';
require_once ADI_DIR . 'includes/activation.php';
require_once ADI_DIR . 'includes/steps.php';

// Load the Whizzie class and other dependencies
require trailingslashit( am_demo_importer_WHIZZIE_DIR ) . 'am_demo_importer_whizzie.php';

/**
 * This kicks off the wizard
 **/
if( class_exists( 'am_demo_importer_ThemeWhizzie' ) ) {
	$am_demo_importer_ThemeWhizzie = new am_demo_importer_ThemeWhizzie();
}
