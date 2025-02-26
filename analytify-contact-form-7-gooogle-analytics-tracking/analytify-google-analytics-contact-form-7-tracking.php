<?php
/*
 * Plugin Name: Analytify - Contact form 7 Gooogle Analytics Tracking
 * Plugin URI: https://analytify.io/addons/
 * Description: It is a Free Add-on by Analytify for Contact form 7 to Track Form Submissions with Google Analytics.
 * Version: 1.1
 * License: GPLv3 or later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Author: Analytify
 * Author URI: https://analytify.io/
 * Text Domain: analytify-google-analytics-contact-form-7-tracking
 * Domain Path: /languages
 */

// Exit if accessed directly
 if ( ! defined( 'ABSPATH' ) ) { exit; }


 define( 'ANALTYIFY_CF7_TRACKING_VERSION', '1.1' );
 define( 'ANALYTIFY_CF7_TRACKING_ROOT_PATH', dirname( __FILE__ ) );

 add_action( 'plugins_loaded' , 'analytify_cf7_track_instance' , 20 );

 function analytify_cf7_track_instance(){

 	// check for analytify
 	if ( ! file_exists( WP_PLUGIN_DIR . '/wp-analytify/analytify-general.php' )  ) {
 		add_action( 'admin_notices' , 'wpa_cf7_track_install_analytify_free' );
 		return;
 	}

 	if ( ! class_exists( 'Analytify_General' ) ) {
 		add_action( 'admin_notices' ,  'wpa_cf7_track_active_analytify_free' );
 		return;
 	}

  // check for cf7
  if ( ! file_exists( WP_PLUGIN_DIR . '/contact-form-7/wp-contact-form-7.php' )  ) {
    add_action( 'admin_notices' , 'wpa_cf7_track_install_cf7' );
    return;
  }

  if ( ! class_exists( 'WPCF7' ) ) {
    add_action( 'admin_notices' ,  'wpa_cf7_track_active_cf7' );
    return;
  }

 	include_once ANALYTIFY_CF7_TRACKING_ROOT_PATH . '/classes/cf7.php';

 }

 /**
  * Admin notice if Analytify not installed.
  *
  * @since 1.0
  */
 function wpa_cf7_track_install_analytify_free( ) {
 	$class = 'notice notice-error is-dismissible';
 	$message = __( 'Please Install Analytify Free to use "Analytify Forms Tracking" add-on.', 'analytify-google-analytics-contact-form-7-tracking' );
 	printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message );

 }

 /**
  * Admin notice if Analytify not activated.
  *
  * @since 1.0
  */
 function wpa_cf7_track_active_analytify_free( ) {
 	$class = 'notice notice-error is-dismissible';
 	$message = __( 'Required: Activate Analytify Free to use "Analytify CF7 Forms Tracking" add-on.', 'analytify-google-analytics-contact-form-7-tracking' );
 	printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message );

 }

 /**
  * Admin notice if Contact Form 7 not installed.
  *
  * @since 1.2
  */
 function wpa_cf7_track_install_cf7( ) {
   $class = 'notice notice-error is-dismissible';
   $message = __( 'Required: Install Contact Form 7 to use "Analytify CF7 Forms Tracking" add-on.', 'analytify-google-analytics-contact-form-7-tracking' );
   printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message );

 }

 /**
  * Admin notice if Contact Form 7 not activated.
  *
  * @since 1.0
  */
 function wpa_cf7_track_active_cf7( ) {
   $class = 'notice notice-error is-dismissible';
   $message = __( 'Required: Activate Contact Form 7 to use "Analytify CF7 Forms Tracking" add-on.', 'analytify-google-analytics-contact-form-7-tracking' );
   printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message );

 }


?>
