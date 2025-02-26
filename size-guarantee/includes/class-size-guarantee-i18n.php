<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.sizeguarantee.com/
 * @since      1.0.0
 *
 * @package    Size_Guarantee
 * @subpackage Size_Guarantee/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Size_Guarantee
 * @subpackage Size_Guarantee/includes
 * @author     Size Guarantee <support@sizeguarantee.com>
 */
class Size_Guarantee_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	/**
	 * [load_plugin_textdomain Loads plugin text domain ]
	 * @param  []  
	 * @return []          
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'size-guarantee',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
