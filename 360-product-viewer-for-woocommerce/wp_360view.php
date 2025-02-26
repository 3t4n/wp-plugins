<?php
use \WP360view\Config\Wp360view_Config;

/**
 * The plugin bootstrap file
 * 
 *
 * @link              https://wordpress.org/plugins/360-product-viewer-for-woocommerce/
 * @since             1.0
 * @package           Wp360view
 *
 * @wordpress-plugin
 * Plugin Name:       360 Product Viewer for WooCommerce
 * Plugin URI:        https://wordpress.org/plugins/360-product-viewer-for-woocommerce/
 * Description:       360 Product Viewer for WooCommerce 
 * Version:           1.3
 * Author:            Qewebby
 * Author URI:        https://www.qewebby.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp360view
 * Domain Path:       /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} 

// Load plugin if woocommerce installed else show notice to install woocommerce. 
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {

	// Define required constants
	if ( ! defined( "WP360VIEW_PLUGIN_URL" ) ) {
		define( "WP360VIEW_PLUGIN_URL", plugin_dir_url( __FILE__ ) );
	} 
	if ( ! defined( "WP360VIEW_ABSPATH" ) ) {
		define( "WP360VIEW_ABSPATH", trailingslashit( plugin_dir_path( __FILE__ ) ) );
	} 
	if ( ! defined( "WP360VIEW_PLUGIN_DIR" ) ) {
		define( "WP360VIEW_PLUGIN_DIR", WP360VIEW_ABSPATH );
	}
	if ( ! defined( "WP360VIEW_PLUGIN_BASENAME" ) ) {
		define( "WP360VIEW_PLUGIN_BASENAME", plugin_basename( __FILE__ ) );
	}	

	if( ! function_exists( 'wp360view_plugin' ) ) {
		
		function wp360view_plugin() {

				// Load the autoloader from it's own file
				require_once WP360VIEW_ABSPATH . 'autoload.php'; 
				
				// The code that runs during plugin deactivation.
				if( ! function_exists( 'wp360view_deactivate' ) ) {
					
					function wp360view_deactivate() {
						\WP360view\Core\Wp360view_Deactivator::deactivate();
					}

					register_deactivation_hook( __FILE__, 'wp360view_deactivate' ); 
				}				
				
				if( ! function_exists( 'wp360view_enqueue_custom_style' ) ) {
					
					function wp360view_enqueue_custom_style() {

						wp_register_style( 'magnific-popup', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.2.0/magnific-popup.css', null, Wp360view_Config::WC_MIN_PLUGIN_VERSION );
						wp_enqueue_style( 'magnific-popup' );

						wp_register_style( 'threesixty-css', WP360VIEW_PLUGIN_URL . 'css/threesixty.min.css', null, Wp360view_Config::WC_MIN_PLUGIN_VERSION );
						wp_enqueue_style( 'threesixty-css' );

						wp_register_style( 'image-zoom-css', WP360VIEW_PLUGIN_URL . 'css/jquery.pan.css', null, Wp360view_Config::WC_MIN_PLUGIN_VERSION );
						wp_enqueue_style( 'image-zoom-css' );

						wp_register_style( 'ro-core-style', WP360VIEW_PLUGIN_URL . 'css/custom.css', null, Wp360view_Config::WC_MIN_PLUGIN_VERSION );
						wp_enqueue_style( 'ro-core-style' );	

						wp_register_script( 'jquery-magnific-popup','https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.2.0/jquery.magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );
						wp_enqueue_script( 'jquery-magnific-popup' );
						
						wp_register_script( 'screenfull', WP360VIEW_PLUGIN_URL.'js/screenfull.js', array( 'jquery' ), '4.2.0', true );
						wp_enqueue_script( 'screenfull' );

						wp_register_script( 'threesixty-js', WP360VIEW_PLUGIN_URL.'js/threesixty.js', array( 'jquery' ), '2.5.2', true );
						wp_enqueue_script( 'threesixty-js' );

						wp_register_script( 'image-zoom-js', WP360VIEW_PLUGIN_URL . 'js/jquery.pan.js', array( 'jquery' ), Wp360view_Config::WC_MIN_PLUGIN_VERSION, true);
						wp_enqueue_script( 'image-zoom-js' );

						wp_register_script( 'ro-custom-js', WP360VIEW_PLUGIN_URL.'js/custom.js', array( 'jquery' ), Wp360view_Config::WC_MIN_PLUGIN_VERSION, true );
						wp_enqueue_script( 'ro-custom-js' );
						wp_localize_script( 'ro-custom-js', 'customAddon', array(

							'navigation'    => !empty( get_option('navigation') ) ? get_option('navigation') : 'false',
							'drag'			=> !empty( get_option('drag') ) ? get_option('drag') : 'false',
							'playspeed'		=> !empty( get_option('playspeed') ) ? get_option('playspeed') : 100,
							'framerate'		=> !empty( get_option('framerate') ) ? get_option('framerate') : 10,
							'enablespin'	=> !empty( get_option('enablespin') ) ? get_option('enablespin') : 'false',
							'showcursor'	=> !empty( get_option('showcursor') ) ? get_option('showcursor') : 'false',
						) );

					}

					add_action( 'wp_enqueue_scripts', 'wp360view_enqueue_custom_style' );
				}				

				if( ! function_exists( 'wp360view_enqueue_admin_custom_style' ) ) {
					
					function wp360view_enqueue_admin_custom_style() {

						wp_register_style( 'custom-admin-css', WP360VIEW_PLUGIN_URL . 'css/360-admin-custom.css', null, Wp360view_Config::WC_MIN_PLUGIN_VERSION );
						wp_enqueue_style( 'custom-admin-css' );
					
					}

					add_action( 'admin_enqueue_scripts', 'wp360view_enqueue_admin_custom_style' );
				}				

				if( ! function_exists( 'wp360view_action_links' ) ) {
					
					function wp360view_action_links( $links ) {
						
						$url = 'admin.php?page=wc-settings&tab=wp360view_settings';
						
						$settings_link = '<a href="'. esc_url( $url ) .'">'. esc_html__( 'Settings', 'wp360view' ) .'</a>';
						
						array_unshift( $links, $settings_link );
						
						return $links;
					}

					add_filter( 'plugin_action_links_' . WP360VIEW_PLUGIN_BASENAME, 'wp360view_action_links' );
				}				
	
				// Load session if it is not created
				add_action( 'woocommerce_init', function(){
					if (  function_exists( 'WC' ) && class_exists( 'woocommerce' ) && is_plugin_active( 'woocommerce/woocommerce.php' ) && isset(WC()->session) && ! WC()->session->has_session() ) {
						WC()->session->set_customer_session_cookie( true );
					}
				},9999 );

				// Start the execution of the plugin.
				if( ! function_exists( 'wp360view_run_plugin' ) ) {
					
					function wp360view_run_plugin() {
						return \WP360view\Wp360view_Run::instance(); 
					}
					wp360view_run_plugin();
				}				
				
		}

		add_action( 'plugins_loaded', 'wp360view_plugin', 999 );
	
	}

} else { 

	// Deactivate Plugin Conditional if Woocommerce is not installed.
	if( ! function_exists( 'wp360view_deactivate' ) ) {
		
		function wp360view_deactivate() { 

			if ( ! ( function_exists( 'WC' ) && class_exists( 'woocommerce' ) && is_plugin_active( 'woocommerce/woocommerce.php' ) ) ) { 
				
				add_action('admin_notices', function() {
					echo '<div class="error"><p><strong>' . sprintf( esc_html__( 'WP 360view plugin requires WooCommerce to be installed and active. You can download %s here.', 'woocommerce' ), '<a href="https://woocommerce.com/" target="_blank">'. esc_html__( 'WooCommerce', 'wp360view' ). '</a>' ) . '</strong></p></div>';
				}); 
				deactivate_plugins( plugin_basename( __FILE__ ) );
				if ( isset( $_GET['activate'] ) ) 
					unset( $_GET['activate'] );

			}
	

		}

		add_action( 'admin_init', 'wp360view_deactivate' );
	}
} 