<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://grittechnologies.com
 * @since      1.0.0
 *
 * @package    Grit_Taxonomy_Filter
 * @subpackage Grit_Taxonomy_Filter/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Grit_Taxonomy_Filter
 * @subpackage Grit_Taxonomy_Filter/includes
 * @author     Mrityunjay Kumar
 */
class Grit_Taxonomy_Filter_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'grit-taxonomy-filter',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
