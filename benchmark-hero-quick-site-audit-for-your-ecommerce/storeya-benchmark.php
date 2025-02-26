<?php
/**
 * Plugin Name:       Benchmark Hero - quick site audit for your eCommerce
 * Description:       The WooCommerce plugin that would help you improve your SEO, Marketing & Shopping experience!
 * Version:           1.0.1
 * Requires at least: 5.0
 * Requires PHP:      7.0
 * Author:            StoreYa
 * Author URI:        storeya.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       sybm
 */

define( 'STOREYA_BENCHMARK_PLUGIN_DOMAIN', 'sybm' );
define( 'STOREYA_BENCHMARK_PLUGIN_MAIL_FILE', __FILE__ );
define( 'STOREYA_BENCHMARK_PLUGIN_DIR_PATH', plugin_dir_path( STOREYA_BENCHMARK_PLUGIN_MAIL_FILE ) );
define( 'STOREYA_BENCHMARK_PLUGIN_DIR_URL', plugin_dir_url( STOREYA_BENCHMARK_PLUGIN_MAIL_FILE ) );
define( 'STOREYA_BENCHMARK_PLUGIN_BASENAME', plugin_basename( STOREYA_BENCHMARK_PLUGIN_MAIL_FILE ) );
define( 'STOREYA_BENCHMARK_CLIENT_URL', get_site_url() );

spl_autoload_register( 'storeya_benchmark_autoloader' );
function storeya_benchmark_autoloader( $class_name ) {
  if ( false !== strpos( $class_name, 'StoreYa_Benchmark' ) ) {
    $classes_dir = realpath( plugin_dir_path( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;
		$class_file = strtolower( $class_name ) . '.php';
    require_once $classes_dir . $class_file;
  }
}

StoreYa_Benchmark_Admin::init();
StoreYa_Benchmark_Ajax_Handler::register_ajax_hooks();
StoreYa_Benchmark_Cron_Handler::init();

register_uninstall_hook( STOREYA_BENCHMARK_PLUGIN_MAIL_FILE, 'sybm_uninstall_hook' );
function sybm_uninstall_hook() {
  StoreYa_Benchmark_Report_Handler::delete_data();
}