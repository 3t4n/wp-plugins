<?php
/**
 * Security check
 * Prevent direct access to the file.
 *
 * @since 3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/**
 * Internationalization
 * Load plugin translation files from api.wordpress.org.
 *
 * @since 3.0
 */
class slidelyi18n {

	/**
	 * Constructor
	 */
	public function __construct() {

		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

	}

	/**
	 * Load the text domain for translation
	 */
	public function load_textdomain() {

		load_plugin_textdomain( 'slidely-slideshows-embed' );

	}

}
new slidelyi18n();
