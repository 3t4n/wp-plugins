<?php
/*
 * Plugin Name: DocumentPress
 * Version: 2.1
 * Plugin URI: http://www.fifthsegment.com/
 * Description: Allows you to embed your documents in any format (.docx, .xls, .pdf, .ppt .anything!) on to your wordpress site.
 * Author: Abdullah Irfan
 * Author URI: http://www.fifthsegment.com/
 * Requires at least: 4.0
 * Tested up to: 4.9
 *
 * Text Domain: documentpress
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author AbdullahIrfan
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Load plugin class files
require_once( 'includes/class-documentpress.php' );
require_once( 'includes/class-documentpress-settings.php' );

// Load plugin libraries
require_once( 'includes/lib/class-documentpress-admin-api.php' );
require_once( 'includes/lib/class-documentpress-post-type.php' );
require_once( 'includes/lib/class-documentpress-taxonomy.php' );

/**
 * Returns the main instance of DocumentPress to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object DocumentPress
 */
function DocumentPress () {
	$instance = DocumentPress::instance( __FILE__, '1.8.0' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = DocumentPress_Settings::instance( $instance );
	}

	return $instance;
}

DocumentPress();