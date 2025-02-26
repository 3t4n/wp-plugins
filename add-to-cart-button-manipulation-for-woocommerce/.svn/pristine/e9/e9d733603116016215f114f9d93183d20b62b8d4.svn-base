<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wpgenie.org
 * @since             1.0.0
 * @package           Wc_Atcbm
 *
 * @wordpress-plugin
 * Plugin Name:       Add to Cart Button Manipulation for WooCommerce
 * Plugin URI:        https://wordpress.org/plugins/add-to-cart-button-manipulation-for-woocommerce/
 * Description:       WooCommerce extension that allows advanced add to cart button manipulation (allow or disallow add to cart, allow purchase in specific time frame with countdown)
 * Version:           1.0.2
 * Author:            wpgenie
 * Author URI:        https://wpgenie.org
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wc-atcbm
 * Domain Path:       /languages
 *
 * WC requires at least: 3.0
 * WC tested up to: 9.0
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	/**
	 * The core plugin class that is used to define internationalization,
	 * admin-specific hooks, and public-facing site hooks.
	 */
	require plugin_dir_path( __FILE__ ) . 'includes/class-wc-atcbm.php';


	/**
	 * Begins execution of the plugin.
	 *
	 * Since everything within the plugin is registered via hooks,
	 * then kicking off the plugin from this point in the file does
	 * not affect the page life cycle.
	 *
	 * @since    1.0.0
	 */
	function run_Wc_Atcbm() {

		$plugin = new Wc_Atcbm();
		$plugin->run();


	}

	add_action( 'woocommerce_init' ,'run_Wc_Atcbm');

} else {

	add_action( 'before_woocommerce_init', function() {
		if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
		}
	} );


	add_action('admin_notices', 'wc_atcbm_activation_notice');
	function wc_atcbm_activation_notice(){
		global $current_screen;
		if($current_screen->parent_base == 'plugins'){
			echo '<div class="error"><p>Add to Cart Button Manipulation for WooCommerce '.__('requires <a href="http://www.woothemes.com/woocommerce/" target="_blank">WooCommerce</a> to be activated in order to work. Please install and activate <a href="'.admin_url('plugin-install.php?tab=search&type=term&s=WooCommerce').'" target="_blank">WooCommerce</a> first.', 'wc_lottery').'</p></div>';
		}
	}
	$plugin = plugin_basename(__FILE__);

	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

	if(is_plugin_active($plugin)){
	 	deactivate_plugins( $plugin);
	}
	 if ( isset( $_GET['activate'] ) )
    		unset( $_GET['activate'] );
}
