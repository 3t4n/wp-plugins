<?php
/**
 * @package GF_Emercury_Bootstrap
 *
 * Plugin Name: Emercury for Gravity Forms
 * Plugin URI: https://www.emercury.net/resources/Apps-Integrations/Emercury-Gravity-Forms-Wordpress-Plugin
 * Description: Join the 10,000+ customers who use Emercury, an email marketing platform made for lead generators. Sync your customer’s first name, last name, email address, and more.
 * Version: 1.3
 * Author: Emercury
 * Author URI: https://www.emercury.net
 *
 * Copyright (c) 2020 Emercury
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * @author    Emercury
 * @copyright Copyright (c) 2020 Emercury
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0.
 *
 */

define( 'GF_EMERCURY_VERSION', '1.1' );

/**
 * Request Timeout
 */
add_filter( 'http_request_timeout', 'gf_emercury_timeout_extend' );
function gf_emercury_timeout_extend( $time )
{
    return 15;
}

// If Gravity Forms is loaded, bootstrap the Emercury Add-On.
add_action( 'gform_loaded', array( 'GF_Emercury_Bootstrap', 'load' ), 5 );

/**
 * Class GF_Emercury_Bootstrap
 *
 * Handles the loading of the Emercury Add-On and registers with the Add-On Framework.
 */
class GF_Emercury_Bootstrap {

	/**
	 * If the Feed Add-On Framework exists, Emercury Add-On is loaded.
	 *
	 * @access public
	 * @static
	 */
	public static function load() {

		if ( ! method_exists( 'GFForms', 'include_feed_addon_framework' ) ) {
			return;
		}

		require_once( 'class-gf-emercury.php' );

		GFAddOn::register( 'GFEmercury' );
	}
}

/**
 * Returns an instance of the GFEmercury class
 *
 * @see    GFEmercury::get_instance()
 *
 * @return object GFEmercury
 */
function gf_emercury() {
	return GFEmercury::get_instance();
}
