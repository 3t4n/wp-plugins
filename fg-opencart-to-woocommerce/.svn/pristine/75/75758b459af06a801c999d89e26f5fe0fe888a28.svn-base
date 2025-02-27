<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://wordpress.org/plugins/fg-opencart-to-woocommerce/
 * @since 1.0.0
 *
 * @package    FG_OpenCart_to_WooCommerce
 * @subpackage FG_OpenCart_to_WooCommerce/includes
 */

if ( !class_exists('FG_OpenCart_to_WooCommerce_i18n', false) ) {

	/**
	 * Define the internationalization functionality.
	 *
	 * Loads and defines the internationalization files for this plugin
	 * so that it is ready for translation.
	 *
	 * @package    FG_OpenCart_to_WooCommerce
	 * @subpackage FG_OpenCart_to_WooCommerce/includes
	 * @author     Frédéric GILLES
	 */
	class FG_OpenCart_to_WooCommerce_i18n {

		/**
		 * The domain specified for this plugin.
		 *
		 * @access   private
		 * @var      string    $domain    The domain identifier for this plugin.
		 */
		private $domain;

		/**
		 * Load the plugin text domain for translation.
		 */
		public function load_plugin_textdomain() {

			load_plugin_textdomain(
				$this->domain,
				false,
				dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
			);

		}

		/**
		 * Set the domain equal to that of the specified domain.
		 * 
		 * @param    string    $domain    The domain that represents the locale of this plugin.
		 */
		public function set_domain( $domain ) {
			$this->domain = $domain;
		}

	}
}
