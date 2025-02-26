<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @wordpress-plugin
 * Plugin Name:       Add Google Analytics to WP
 * Description:       Google Analytics plugin for WordPress.
 * Version:           1.0.1
 * Author:            Meetanshi
 * Author URI:        https://meetanshi.com/
 * License:           GPL-2.0+
 * Text Domain:       add-google-analytics-to-wp
 * Domain Path:       /languages
 */
/*if (!define( 'WPINC', 'wp-includes' )){
    die;
}*/
define( 'MEETANSHI_VERSION', '1.0.1' );
define( 'MEETANSHI__MINIMUM_WP_VERSION', '4.0' );
define( 'MEETANSHI__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
function activate_meetanshi_google_analytics() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/meetanshi-google-analytics-activator.php';
    Meetanshi_Google_Analytics_Activator::activate();
}
function deactivate_meetanshi_google_analytics() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/meetanshi-google-analytics-deactivator.php';
    Meetanshi_Google_Analytics_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_meetanshi_google_analytics' );
register_deactivation_hook( __FILE__, 'deactivate_meetanshi_google_analytics' );



require_once( plugin_dir_path(__FILE__) . '/admin/meetanshi-sqlfile.php' );
register_activation_hook( __FILE__, array( 'Meetanshi_sql', 'mdetector_activate' ) );


include (plugin_dir_path(__FILE__).'admin/ga-admin.php');
include (plugin_dir_path(__FILE__).'includes/meet-google-style.php');


function meet_add_setting_link($link){
    $setting_link = '<a href="admin.php?page=meet-ga">'.__('Setting').'</a>';
    array_push($link,$setting_link);
    return $link;
}
$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_$plugin", 'meet_add_setting_link' );