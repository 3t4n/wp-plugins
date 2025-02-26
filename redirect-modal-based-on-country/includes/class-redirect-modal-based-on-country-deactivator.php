<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://github.com/David-Kurniawan/
 * @since      1.0.0
 *
 * @package    Redirect_Modal_Based_On_Country
 * @subpackage Redirect_Modal_Based_On_Country/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Redirect_Modal_Based_On_Country
 * @subpackage Redirect_Modal_Based_On_Country/includes
 * @author     David Kurniawan <jatinangorservice@gmail.com>
 */
class Redirect_Modal_Based_On_Country_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
        if (get_option(RMBOC_SHORT_PREFIX.'_cookie_name')) {
            delete_option(RMBOC_SHORT_PREFIX.'_cookie_name');
        }
	}

}
