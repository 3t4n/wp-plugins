<?php
/*
Plugin Name: TextMe SMS
Plugin URI:  https://textme.co.il/
Description: Send custom SMS messages from your WordPress site to your customers.
Version:     1.9.1
Author:      Matat Technologies
Author URI:  https://matat.co.il/
Text Domain: textme-sms-integration
*/



/**
 * Security check
 *
 * Prevent direct access to the file.
 *
 * @since 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define('TMI_BASEPATH', dirname( plugin_basename( __FILE__ ) ));

/**
 * Include plugin files
 */
include_once ( plugin_dir_path( __FILE__ ) . 'includes/i18n.php' );
include_once ( plugin_dir_path( __FILE__ ) . 'includes/scripts-styles.php' );
include_once ( plugin_dir_path( __FILE__ ) . 'includes/admin.php' );



/**
 * Include external addons and extensions
 */
include_once ( plugin_dir_path( __FILE__ ) . 'extensions/sms-geteway.php' );
include_once ( plugin_dir_path( __FILE__ ) . 'extensions/elementor.php' );
include_once ( plugin_dir_path( __FILE__ ) . 'extensions/contact-form-7.php' );
include_once ( plugin_dir_path( __FILE__ ) . 'extensions/woocommerce.php' );
include_once ( plugin_dir_path( __FILE__ ) . 'extensions/pojo-forms.php' );
