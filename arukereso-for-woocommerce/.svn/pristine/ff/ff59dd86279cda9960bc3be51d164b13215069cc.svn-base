<?php
	/*
		Plugin Name: Árukereső for Woocommerce
		Plugin URI: https://bitron.hu/arukereso-for-woocommerce/
		Description: Egyedi feed segítségével megjeleníti a Woocommerce-ben felvitt termékeket az Árukereső számára.
		Version: 2.9
		Author:      Oaron
		Author URI: https://bitron.hu
		License:     GPL2
		License URI: https://www.gnu.org/licenses/gpl-2.0.html
		Text Domain: woo-arukereso
				Domain Path: /lang
		WC requires at least: 3.0
		WC tested up to: 8.5.1
	*/
	define("WARUK_FREE", 1);
	//HPOS kompatibilitás
add_action( 'before_woocommerce_init', function() {
	if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
			}
} );

	class waruk_main {
		public function __construct() {
			//loader
						foreach (glob(__DIR__."/includes/class-*.php") as $filename) {
				include $filename;
			}
			add_action('init', array($this, 'waruk_translation_load'));
						}
			/*
				* load translations
				*/
				public function waruk_translation_load() {
		load_plugin_textdomain( 'woo-arukereso', false, plugin_basename( dirname( __FILE__ ) ) . '/lang/' );
					}
					
		}
		new waruk_main();
?>