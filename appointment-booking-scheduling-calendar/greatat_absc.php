<?php
    /*
    Plugin Name: Appointment Booking, Scheduling & Calendar
    Description: Allow clients and customers to book appointments with you directly on your Wordpress website. Scheduling, asAvailability and Calendar are all easily managed from your GreatAt account.
    Author: GreatAt, Inc
    Version: 1.0.0
    Author URI: https://www.greatat.com?mc=wpw_plugin_row_author
    */

    define('GREATAT_ABSC_PLUGIN_VERSION', '1.0.0');
    if(!defined('GREATAT_ABSC_CSS_VER')) define('GREATAT_ABSC_CSS_VER', '1.0.1');

    if(!defined('GREATAT_ABSC_DOMAIN')) define('GREATAT_ABSC_DOMAIN','www');
    if(!defined('GREATAT_ABSC_FILE')) define( 'GREATAT_ABSC_FILE', __FILE__ );
    if(!defined('GREATAT_ABSC_PLUGIN_DIR')) define('GREATAT_ABSC_PLUGIN_DIR', untrailingslashit(plugin_dir_path(GREATAT_ABSC_FILE)));
    if(!defined('GREATAT_ABSC_PLUGIN_URL')) define('GREATAT_ABSC_PLUGIN_URL', plugin_dir_url(__FILE__));


    // Avoid direct calls to this file and prevent full path disclosure
    if ( ! defined( 'ABSPATH' ) ) { exit; }

    require_once GREATAT_ABSC_PLUGIN_DIR.'/php/main.php';

    if ( is_admin() ) {
        require_once GREATAT_ABSC_PLUGIN_DIR.'/php/admin.php';
    }



    function GREATAT_ABSC_PLUGIN_url( $path ) {
        return trailingslashit( GREATAT_ABSC_PLUGIN_DIR ) . ltrim( $path, '/\\' );
    }

