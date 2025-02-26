<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.itpathsolutions.com/
 * @since      1.0.0
 *
 * @package    Advanced_Images_Gallery_With_Lightbox
 * @subpackage Advanced_Images_Gallery_With_Lightbox/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Advanced_Images_Gallery_With_Lightbox
 * @subpackage Advanced_Images_Gallery_With_Lightbox/includes
 * @author     It Path Solutions <shailm@itpathsolutions.com>
 */
class Advanced_Images_Gallery_With_Lightbox_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'advanced-images-gallery-with-lightbox',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
