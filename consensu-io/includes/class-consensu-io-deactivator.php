<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://consensu.io
 * @since      1.0.0
 *
 * @package    Consensu_IO
 * @subpackage Consensu_IO/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Consensu_IO
 * @subpackage Consensu_IO/includes
 * @author      Consensu.IO <contato@consensu.io>
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

class Consensu_IO_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		delete_option(CONSENSU_IO_OPTION_NAME);
	}

}
