<?php

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Appconsent_Cmp_Sfbx
 * @subpackage Appconsent_Cmp_Sfbx/includes
 * @author     Sfbx Team <dev-wp@sfbx.io>
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if (! class_exists('Appconsent_Cmp_Sfbx_i18n')) {
	class Appconsent_Cmp_Sfbx_i18n {


		/**
		 * Load the plugin text domain for translation.
		 *
		 * @since    1.0.0
		 */
		public function load_plugin_textdomain() {

			load_plugin_textdomain(
				'appconsent-cmp-sfbx',
				false,
				dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
			);

		}

	}

}