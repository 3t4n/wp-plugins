<?php
/**
 * Plugin Name: Lorem Ipsum by Webline
 * Plugin URI: http://www.weblineindia.com
 * Description: A Simple plugin to generate lorem ipsum dummy text using shortcode.
 * Author: weblineindia
 * Version: 1.0.10
 * Author URI: http://www.weblineindia.com
 * License: GPL
 */

// Prevent direct file access
if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

require_once ( ABSPATH . 'wp-admin/includes/plugin.php' );

$plugin_data = get_plugin_data( __FILE__ );

define( 'WLI_LOREM_VERSION', $plugin_data['Version'] );
define( 'WLI_LOREM_DEBUG', FALSE );
define( 'WLI_LOREM_PATH', plugin_dir_path( __FILE__ ) );
define( 'WLI_LOREM_URL', plugins_url( '', __FILE__ ) );
define( 'WLI_LOREM_PLUGIN_FILE', basename( __FILE__ ) );
define( 'WLI_LOREM_PLUGIN_DIR', plugin_basename( dirname( __FILE__ ) ) );
define( 'WLI_LOREM_ADMIN_DIR', WLI_LOREM_PATH . 'Public' );

require_once ( WLI_LOREM_ADMIN_DIR . '/class/hook.php' );

require_once ( WLI_LOREM_ADMIN_DIR . '/class/lorem-ipsum-wli.php' );

require_once ( WLI_LOREM_ADMIN_DIR . '/inc/shortcode.php' );

add_filter( 'plugin_action_links_'  . plugin_basename(__FILE__), 'libw_add_action_links');
// Function for add action link
function libw_add_action_links($links_array)
{
    array_unshift($links_array, '<a href="' . admin_url('options-general.php?page=lorem-ipsum') . '">Settings</a>');
    return $links_array;
}

add_filter('pre_set_site_transient_update_plugins','update_lipsum_wli');
/* Check update hook Start */
function update_lipsum_wli($transient)
{
    if (empty($transient->checked)) {
        return $transient;
    }
    $plugin_folder = plugin_basename(__FILE__);
    if (isset($transient->checked[$plugin_folder])) {
        update_option('libw_activation_date', time());
    }
    return $transient;
}   
/* Check update hook End */
?>
