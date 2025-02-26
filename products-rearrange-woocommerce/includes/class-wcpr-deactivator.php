<?php
/**
 * Fired during plugin deactivation
 *
 * @link       http://haywoodtech.it
 * @since      1.0.0
 *
 * @package    Wcpr
 * @subpackage Wcpr/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Wcpr
 * @subpackage Wcpr/includes
 * @author     Devtea, <devteam@haywoodtech.it>
 */
class Wcpr_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		update_option( WCPR_DEACTIVATION, time() );
	}

}
