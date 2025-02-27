<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://technifyguru.com/
 * @since      1.0.0
 *
 * @package    Tgqb
 * @subpackage Tgqb/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Tgqb
 * @subpackage Tgqb/includes
 * @author     Technify Guru <contact@technifyguru.com>
 */
class Tgqb_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

		unregister_setting('tgqb_styling', 'tgqb_styling');


	}

}
