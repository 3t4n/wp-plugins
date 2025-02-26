<?php
/**
 * Plugin Name: Display Tag To Woocommerce Products
 * Description: Add your own Tag to WooCommerce Products,You Can define number of days to display tags,  Add Custom Wordings for Tags.
 * Author:      themelocation
 * Version:     1.0
 * Author URI:  https://www.themelocation.com
 * Plugin URI:  https://www.themelocation.com
 */


if(in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {




	function Activate_Wc_Tag_Products (){
		require_once plugin_dir_path( __FILE__ ) . 'classes/wc_tag_on_products_activator.php';
		Wc_Tag_Activator::activate();

	}


	register_activation_hook( __FILE__, 'Activate_Wc_Tag_Products' );

    require plugin_dir_path( __FILE__ ) . 'classes/class-wc_tag_on_products.php';

	/**
	 * Begins execution of the plugin.
	 *
	 * Since everything within the plugin is registered via hooks,
	 * then kicking off the plugin from this point in the file does
	 * not affect the page life cycle.
	 *
	 * @since    1.0.0
	 */
	function run_wc_tag_on_products() {

		$plugin = new Wc_Tag_On_Products();
		$plugin->run();

	}
	run_wc_tag_on_products();



}