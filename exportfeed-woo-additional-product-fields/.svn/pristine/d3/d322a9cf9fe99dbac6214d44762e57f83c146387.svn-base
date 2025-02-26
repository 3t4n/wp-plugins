<?php
/**
 * Plugin Name:  ExportFeed - Woo Additional Product Fields
 * Plugin URI:   www.exportfeed.com
 * Description:  Plugin to add custom fields to products in WooCommerce
 * Author:       ExportFeed
 * Version:      1.0.2
 * Author URI:   https://profiles.wordpress.org/purpleturtlepro/
 * Text Domain:  wapf_woo_additional_fields
 * WC requires at least: 3.5
 * WC tested up to: 4.0.1
 * Copyright 2019 Digital Products lab. All rights reserved.
 * license GNU General Public License version 3 or later; see GPLv3.txt
 */

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin to add extra fields to your WooCommerce products, not much I can do when called directly.';
    exit;
}

define( 'WAPF_ADDITIONAL_FIELDS_VERSION', '1.1.0' );
define( 'WAPF_ADDITIONAL_MINIMUM_WP_VERSION', '4.0' );
define( 'WAPF_ADDITIONAL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );


register_activation_hook( __FILE__, array( 'WAPF_AdditionalFields', 'wapf_plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'WAPF_AdditionalFields', 'wapf_plugin_deactivation' ) );

require_once( WAPF_ADDITIONAL_PLUGIN_DIR . 'class.exportfeed-additional-fields.php' );

add_action( 'wapf_init', array( 'WAPF_AdditionalFields', 'wapf_init' ) );
do_action('wapf_init');
