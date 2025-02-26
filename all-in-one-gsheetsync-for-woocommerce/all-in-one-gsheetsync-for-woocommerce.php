<?php
/**
 * Plugin Name: All-in-One GSheetSync for WooCommerce
 * Plugin URI: https://techiesaround.com/all-in-one-gsheetsync-for-woocommerce/
 * Description: Sync WooCommerce orders, product inventory, and customer data effortlessly to Google Sheets, simplifying your data management tasks.
 * Version: 1.0.2
 * Author: Techiesaround
 * Requires Plugins: woocommerce
 * Author URI: https://www.techiesaround.com/
 * Text Domain: all-in-one-gsheetsync-for-woocommerce
 * Domain Path: /languages
 * License: GPLv3 or later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 **/

if (! defined('ABSPATH')) {
    die;
}

require_once plugin_dir_path(__FILE__) . 'admin/settings_initiate.php';
if (!function_exists('aiogsc_menu')) {
function aiogsc_menu()
{    
    add_menu_page('All-in-One GSheetSync for WooCommerce', 'All-in-One GSheetSync for WooCommerce', 'manage_options', 'aiogsc-settings', 'aiogsc_settings');
}
}
add_action('admin_menu', 'aiogsc_menu');

if (!function_exists('aiogsc_load_css_and_js')) {
function aiogsc_load_css_and_js()
{
    $aiogsc_style_version = filemtime(plugin_dir_path(__FILE__) . 'aiogsc_style.css');
    $aiogsc_script_version = filemtime(plugin_dir_path(__FILE__) . '/admin/js/aiogsc_script.js');
    $bootstrap_css_version = filemtime(plugin_dir_path(__FILE__) . '/admin/css/bootstrap.min.css');
    $datatables_js_version = filemtime(plugin_dir_path(__FILE__) . '/admin/js/jquery.dataTables.min.js');
    $datatables_bootstrap_js_version = filemtime(plugin_dir_path(__FILE__) . '/admin/js/dataTables.bootstrap.min.js');
    $datatables_css_version = filemtime(plugin_dir_path(__FILE__) . '/admin/js/dataTables.bootstrap.min.css');
    $logstable_js_version = filemtime(plugin_dir_path(__FILE__) . '/admin/js/aiogsc_logstable.js');

    wp_enqueue_style('aiogsc_style', plugins_url('aiogsc_style.css', __FILE__), array(), $aiogsc_style_version);
    wp_enqueue_script('aiogsc_script', plugins_url('/admin/js/aiogsc_script.js', __FILE__), array(), $aiogsc_script_version, true);

    wp_enqueue_style('datatables_bootstrap', plugins_url('/admin/css/bootstrap.min.css', __FILE__), array(), $bootstrap_css_version);
    wp_enqueue_script('datatables', plugins_url('/admin/js/jquery.dataTables.min.js', __FILE__), array(), $datatables_js_version, true);
    wp_enqueue_script('datatables_bootstrap', plugins_url('/admin/js/dataTables.bootstrap.min.js', __FILE__), array(), $datatables_bootstrap_js_version, true);
    wp_enqueue_style('datatables_style', plugins_url('/admin/js/dataTables.bootstrap.min.css', __FILE__), array(), $datatables_css_version);

    wp_localize_script('aiogsc_script', 'aiogsc_ajax_object', array( 
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('aiogsc_Sync')
    ));

    wp_enqueue_script('aiogsc_logs_datatables', plugins_url('/admin/js/aiogsc_logstable.js', __FILE__), array(), $logstable_js_version, true);
    
    wp_localize_script('aiogsc_logs_datatables', 'aiogsc_url', array( 
        'ajax_url' => admin_url('admin-ajax.php?action=aiogsc_logs_datatables')
    ));
}
}
add_action('admin_enqueue_scripts', 'aiogsc_load_css_and_js');
add_action('plugins_loaded', 'aiogsc_load_files');

if (!function_exists('aiogsc_load_files')) {
function aiogsc_load_files(){
    add_filter('plugin_row_meta', 'aiogsc_loadContactUs', 10, 2);
    require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';
    require_once plugin_dir_path(__FILE__) . 'admin/event_layer.php';
    require_once plugin_dir_path(__FILE__) . 'admin/frame_layer.php';
    require_once plugin_dir_path(__FILE__) . 'admin/api_layer.php';
    $lang_dir = dirname( plugin_basename( __FILE__ ) ) . '/languages';
    load_plugin_textdomain( 'all-in-one-gsheetsync-for-woocommerce', false, $lang_dir );   
    aiogsc_installer();
}
}

if (!function_exists('aiogsc_loadContactUs')) {
function aiogsc_loadContactUs($plugin_meta, $plugin_file) {
    if (plugin_basename(__FILE__) === $plugin_file) {
        $contact_link = '<a href="https://techiesaround.com/contact-us/" target="_blank">Contact Us</a>';
        $configure_link = '<a href="https://techiesaround.com/create-service-account-in-google-api-console/" target="_blank">How to configure?</a>';
        $plugin_meta[] = $configure_link;
        $plugin_meta[] = $contact_link;
    }
    
    return $plugin_meta;
}
}

if (!function_exists('aiogsc_installer')) {
function aiogsc_installer()
{
    
    global $table_prefix;
    global $wpdb;
    $wp_log_table = $table_prefix .'aiogsc_logs';
    $sql = "CREATE TABLE IF NOT EXISTS `". $wp_log_table . "` ( ";
    $sql .= "  `id`  int(11)   NOT NULL auto_increment, ";
    $sql .= "  `module`  varchar(255)   NOT NULL, ";
    $sql .= "  `response` text NOT NULL, ";
    $sql .= "   `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, ";    
    $sql .= "   PRIMARY KEY (`id`) ";
    $sql .= ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; ";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql ); 
}
}

if (!function_exists('aiogsc_PluginRequirementsCheckWoocommerce')) {
function aiogsc_PluginRequirementsCheckWoocommerce() {
    if ( ! class_exists( 'WooCommerce' ) ) {
        add_action( 'admin_notices', 'aiogsc_errorNotificationMessage' );
        deactivate_plugins( plugin_basename( __FILE__ ) );
    }
}
}
add_action( 'admin_init', 'aiogsc_PluginRequirementsCheckWoocommerce' );

if (!function_exists('aiogsc_errorNotificationMessage')) {
function aiogsc_errorNotificationMessage() {
    echo '<div class="error"><p>' . esc_html__( 'Your Plugin Name requires WooCommerce to be installed and active.', 'all-in-one-gsheetsync-for-woocommerce' ) . '</p></div>';
}
}
