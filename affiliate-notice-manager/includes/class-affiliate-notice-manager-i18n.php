<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://wppathfinder.com
 * @since      1.0.0
 *
 * @package    Affiliate_Notice_Manager
 * @subpackage Affiliate_Notice_Manager/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Affiliate_Notice_Manager
 * @subpackage Affiliate_Notice_Manager/includes
 * @author     Nira Rahman <dragwpofficial@gmail.com>
 */
class Affiliate_Notice_Manager_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'affiliate-notice-manager',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
