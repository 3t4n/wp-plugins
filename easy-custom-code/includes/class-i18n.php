<?php
/* ======================================================
 # Easy Custom Code (LESS/CSS/JS) - Live editing for WordPress - v1.1.2 (free version)
 # -------------------------------------------------------
 # Author: Web357
 # Copyright © 2014-2025 Web357. All rights reserved.
 # License: GNU/GPLv3, http://www.gnu.org/licenses/gpl-3.0.html
 # Website: https://www.web357.com/easy-custom-code-wordpress-plugin
 # Demo: https://demo-wordpress.web357.com/
 # Support: https://www.web357.com/support
 # Last modified: Friday 31 January 2025, 12:48:01 AM
 ========================================================= */
/**
 * Define the internationalization functionality
 */
class EasyCustomCode_i18n {

	/**
	 * Load the plugin text domain for translation.
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'easy-custom-code',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages'
		);

	}
}