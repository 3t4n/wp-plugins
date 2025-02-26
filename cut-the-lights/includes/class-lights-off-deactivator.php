<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://www.cutowl.com/
 * @since      1.0.0
 *
 * @package    Lights_Off
 * @subpackage Lights_Off/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Lights_Off
 * @subpackage Lights_Off/includes
 * @author     Cutowl <contacts@cutowl.com>
 */
class Lights_Off_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		delete_user_meta( get_current_user_id(), 'lightsoff_setting_select');
		delete_user_meta( get_current_user_id(), 'lightsoff_setting_checkbox');
		delete_user_meta( get_current_user_id(), 'lightsoff_setting_toggler');
	}

}
