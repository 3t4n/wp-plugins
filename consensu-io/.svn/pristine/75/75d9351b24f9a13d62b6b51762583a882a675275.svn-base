<?php

/**
 * Fired during plugin activation
 *
 * @link       https://consensu.io
 * @since      1.0.0
 *
 * @package    Consensu_IO
 * @subpackage Consensu_IO/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Consensu_IO
 * @subpackage Consensu_IO/includes
 * @author      Consensu.IO <contato@consensu.io>
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

class Consensu_IO_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$defaults = array(
            'plugin_ver' => CONSENSU_IO_VERSION,
			'client_key' => '', 
			'debug_mode' => false
        );

		if (get_option(CONSENSU_IO_OPTION_NAME, false) === false) {
            update_option(CONSENSU_IO_OPTION_NAME, $defaults);
        }

	}
}
