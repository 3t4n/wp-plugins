<?php
/**
 * Fired during plugin activation
 *
 * @link       http://haywoodtech.it
 * @since      1.0.0
 *
 * @package    Wcpr
 * @subpackage Wcpr/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wcpr
 * @subpackage Wcpr/includes
 * @author     Devtea, <devteam@haywoodtech.it>
 */
class Wcpr_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		update_option( WCPR_VERSION_TEXT, WCPR_VERSION );
	}

}
