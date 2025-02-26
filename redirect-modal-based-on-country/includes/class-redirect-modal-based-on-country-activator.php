<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/David-Kurniawan/
 * @since      1.0.0
 *
 * @package    Redirect_Modal_Based_On_Country
 * @subpackage Redirect_Modal_Based_On_Country/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Redirect_Modal_Based_On_Country
 * @subpackage Redirect_Modal_Based_On_Country/includes
 * @author     David Kurniawan <jatinangorservice@gmail.com>
 */
class Redirect_Modal_Based_On_Country_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        if (!get_option(RMBOC_SHORT_PREFIX.'_cookie_name')) {
            add_option(RMBOC_SHORT_PREFIX.'_cookie_name', RMBOC_SHORT_PREFIX.'_'.md5(microtime(true)), '', 'yes');
        }
	}

}
