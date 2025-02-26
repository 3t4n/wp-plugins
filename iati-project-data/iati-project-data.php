<?php
/*
 * Plugin Name: IATI Project Data
 * Description: Use this plugin to retrieve information about a specific IATI project from <code>d-portal.org</code> website and store it in a database. The information stored will be updated as soon as d-portal.org updates the data on their own platform.
 * Author: Fotso Fonkam
 * Author URI: http://www.iamfotso.cm
 * Version: 1.0
 * Licence: GLP2+
 * Keywords: iati, d-portal, projects, aid
 * Text Domain: iatiproject
 */

if( !function_exists( 'add_action' ) ) {
    echo "Hi there! I'm just a plugin, not much I can do when called directly.";
    exit;
}

 // SETUP
define( 'IATI_PLUGIN_FILE', __FILE__ );
define( 'IATI_DEV_MODE', false );
define( 'IATI_DOMAIN', 'iatiproject' );

// INCLUDES
include( 'inc/activate.php' );
include( 'inc/deactivate.php' );
include( 'inc/enqueue.php' );
include( 'inc/admin/menu.php' );
include( 'inc/fetch-project-data.php' );
include( 'inc/functions.php' );
include( 'inc/shortcodes/display-project-data.php' );
include( 'inc/textdomain.php' );

// HOOKS
register_activation_hook( __FILE__, 'iati_plugin_activation' );
register_deactivation_hook( __FILE__, 'iati_plugin_deactivation' );
add_action( 'admin_menu', 'iati_admin_menu' );
add_action( 'wp_enqueue_scripts', 'iati_enqueue' );
add_action( 'admin_enqueue_scripts', 'iati_admin_enqueue' );
add_action( 'admin_post_iati_fetch_project_data', 'iati_fetch_project_data' );
add_action( 'plugins_loaded', 'iati_load_textdomain' );

// SHORTCODES
add_shortcode( 'iati-project-data', 'iati_project_data' );