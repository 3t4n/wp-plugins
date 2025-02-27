<?php

namespace G_Smtp;

use G_Smtp\Traits\Singleton;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Class I18n
 */
class I18n {
	use Singleton;

	/**
	 * Init function
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'init', [ $this, 'load_language_files' ], 1 );
	}

	/**
	 * Loads the language-files to be used throughout the plugin
	 *
	 * @return void
	 */
	public function load_language_files() {
		// Check if our plugin folder is used as a mu-plugin
		if ( basename( dirname( G_SMTP_DIR ) ) === 'mu-plugins' ) {
			load_muplugin_textdomain( 'g-smtp', basename( G_SMTP_DIR ) . '/languages' );
		} else {
			load_plugin_textdomain( 'g-smtp', false, basename( G_SMTP_DIR ) . '/languages' );
		}
	}

}
