<?php
/**
Plugin Name: Client Carousel
Description: Client Carousel.
Version: 1.0.0
Author:Creative pig
Author URI:http://www.creativepig.net/
*/
define( 'LOGO_NAME', 'Client  Carousel' );
define( 'LOGO_SLUG', 'cp' );
define( 'LOGO_BASENAME', basename( dirname( __FILE__ ) ) );
define( 'LOGO_DIR', rtrim( plugin_dir_path( __FILE__ ), '/' ) );
define( 'LOGO_URL', rtrim( plugin_dir_url( __FILE__ ), '/' ) );
define('LOGO_IMAGE_URL', LOGO_URL.'/classes/assets/images/');
define( 'LOGO_CAROUSEL', 'cpcarousel' );

require plugin_dir_path( __FILE__ ) . 'classes/cpcarousel.php';
function run_logo_carousel() {

	$plugin = new Logo_Carousel();
	$plugin->run();

}
run_logo_carousel();


include('admin/cpadmin_settings.php');
/**default setting**/
function client_initialize(){
    $options_not_set = get_option('clogo_post_type_settings');
    if( $options_not_set ) return;
    
    $clogo_settings = array( 'items' => 3, 'display_item_title' => true, 'single_item' => false,'window_open'=>'_blank', 'slide_speed' => 500, 'pagination_speed' => 500, 'auto_play' => true, 'stop_on_hover' => true, 'navigation' => false, 'pagination' => true, 'responsive' => true );
    update_option('clogo_settings', $clogo_settings);
}
register_activation_hook(__FILE__, 'client_initialize');// Delete the plugin options on uninstall
function client_remove_options(){
    delete_option('client_settings');
}
register_uninstall_hook(__FILE__, 'client_remove_options');
function admin_enqueue_styles(){
			wp_enqueue_style( 'admin', LOGO_URL . '/admin/css/admin.css', array(), '1.0.0', 'all' );
	}
add_action('admin_enqueue_scripts', 'admin_enqueue_styles');