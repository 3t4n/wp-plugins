<?php defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );

/**
 * Plugin Name: Avan Utilities
 * Plugin URI: https://wordpress.org/plugins/avan-utilities/
 * Description: Avan Utilities plugin helps to have a better website in terms of speed and beauty. The possibilities of this plugin are endless.
 * Author: Masoud NKH
 * Author URI: https://beautycute.ir/
 * Version: 5.0
 * Text Domain: avutilang
 * Domain Path: /langs
 * License: GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 **/
 
define('AVUTI_PLUG_FOLDER', plugin_dir_path(__FILE__));
define( 'AVUTI_PLUG_PATH', plugin_dir_url(__FILE__) );
define( 'AVUTI_PLUG_ASSETS', AVUTI_PLUG_PATH . 'assets/' );
define( 'AVUTI_VER', '5.0' );

load_plugin_textdomain( 'avutilang', false, dirname( plugin_basename( __FILE__ ) ) . '/langs' );

function avuti_set_page($links) { 
  $settings_link = '<a href="admin.php?page=avan-settings">' . __( 'Settings', 'avutilang' ) . '</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'avuti_set_page' );


require_once AVUTI_PLUG_FOLDER . 'vendor/masoudnkh/masoudnkh-custom-framework.php';
require_once AVUTI_PLUG_FOLDER . 'include/settings.php';
require_once AVUTI_PLUG_FOLDER . 'include/shortcode/setting.php';
require_once AVUTI_PLUG_FOLDER . 'include/avan-setting/avsetting.php';
require_once AVUTI_PLUG_FOLDER . 'include/init.php';

function avuti_check() {
	update_option('avuti_version', AVUTI_VER);
}

add_action('plugins_loaded', 'avuti_check');

/**
 * Load all plugin options
 *
$avutiver = get_option ( 'avuti_version' );
if($avutiver < '3.0') {
	add_action('admin_notices', 'check_avuti_ver');
}

function check_avuti_ver() {
    $user_id = get_current_user_id();
    if ( !get_user_meta( $user_id, 'avuti_new_version_notice' ) ) 
        echo "<div class='notice avan-update-notice'><p>" . __('The new version of Avan utility tools plugin has many changes, including changing the user interface and reprogramming. Therefore, you need to enter the plugin settings through <a href="admin.php?page=avan-settings">this link </a> and reactivate the items you need and save the settings.', 'avutilang') . "</p><a href='?dismiss-avan-notice'>" . __( 'Disable this avan notice', 'avutilang') . "</a></div>";
}
function avuti_new_version_notice() {
    $user_id = get_current_user_id();
    if ( isset( $_GET['dismiss-avan-notice'] ) )
        add_user_meta( $user_id, 'avuti_new_version_notice', 'true', true );
}
add_action( 'admin_init', 'avuti_new_version_notice' );
*/
