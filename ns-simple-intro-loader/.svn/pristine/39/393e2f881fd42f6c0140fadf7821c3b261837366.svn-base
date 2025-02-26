<?php
/*
Plugin Name: NS Simple Intro Loader
Plugin URI: http://www.nsthemes.com
Description: This plugin include intro loader in your WordPress
Version: 2.2.3
Author: NsThemes
Author URI: http://www.nsthemes.com
Text Domain: ns-woocommerce-watermark
Domain Path: /languages
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** 
 * @author        PluginEye
 * @copyright     Copyright (c) 2019, PluginEye.
 * @version         1.0.0
 * @license       https://www.gnu.org/licenses/gpl-3.0.html GNU General Public License Version 3
 * PLUGINEYE SDK
*/

require_once('plugineye/plugineye-class.php');
$plugineye = array(
    'main_directory_name'       => 'ns-simple-intro-loader',
    'main_file_name'            => 'ns-simple-intro-loader.php',
    'redirect_after_confirm'    => 'admin.php?page=ns-simple-intro-loader%2Fns-admin-options%2Fns_admin_option_dashboard.php',
    'plugin_id'                 => '257',
    'plugin_token'              => 'NWNmZmNiNjg1NmYzMmNmYzlmOWQ1OTY0NGQyYzc4NzM2OWZkZmI0OTYxMTkzNzA0NWE2ZjdiZjg0M2NhYzJkOTkxY2RjZGEyNGU2NTE=',
    'plugin_dir_url'            => plugin_dir_url(__FILE__),
    'plugin_dir_path'           => plugin_dir_path(__FILE__)
);

$plugineyeobj257 = new pluginEye($plugineye);
$plugineyeobj257->pluginEyeStart();      

/* *** include plugin option *** */
require_once( plugin_dir_path( __FILE__ ).'ns-simple-intro-loader-option.php');

/* *** include plugin settings *** */
require_once( plugin_dir_path( __FILE__ ).'ns-admin-options/ns-admin-options-setup.php');


/* *** include frontend js *** */
function ns_s_i_l_load_js( $hook ) {      
        wp_enqueue_script( 'ns-simple-intro-loader',  plugin_dir_url( __FILE__ ).'assets/js/ns-simple-intro-loader.js', array( 'jquery' ), false, true );
        $ns_disp_dim_load =  get_option('ns_simple_loader_dimension', '');
        $ns_disp_style =  get_option('ns_disp_style', '');
        $ns_loader_text =  get_option('ns_loader_text', '');
		wp_enqueue_script( 'ns-simple-intro-loader-custom-big',  plugin_dir_url( __FILE__ ).'assets/js/ns-simple-intro-loader-custom.php?ns_disp_dim_load='.$ns_disp_dim_load.'&ns_disp_style='.$ns_disp_style.'&ns_loader_text='.$ns_loader_text, array( 'jquery' ), false, true );
}
add_action( 'wp_enqueue_scripts', 'ns_s_i_l_load_js' );


/* *** include frontend css *** */
function ns_s_i_l_load_css($hook) {
    	wp_enqueue_style( 'ns-simple-intro-loader.min', plugin_dir_url( __FILE__ ).'assets/css/ns-simple-intro-loader.min.css', array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'ns_s_i_l_load_css' );

/* *** include text domain *** */
function ns_simple_intro_loader_load_plugin_textdomain() {
    load_plugin_textdomain( 'ns-simple-intro-loader', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'ns_simple_intro_loader_load_plugin_textdomain' );


function nsdrawdivfunc(){
	echo '<div id="nsSimLoader" class="introLoading"></div>';
}
add_action('wp_footer', 'nsdrawdivfunc');


/* *** add link premium *** */
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'nssimpleinttroloader_add_action_links' );

function nssimpleinttroloader_add_action_links ( $links ) {	
 $mylinks = array('<a id="nssilpremiumlinkpremium" href="https://www.nsthemes.com/?ref-ns=2&campaign=SIL-linkpremium" target="_blank">'.__( 'Join NS Club', 'ns-facebook-pixel-for-wp' ).'</a>');
return array_merge( $links, $mylinks );
}
?>