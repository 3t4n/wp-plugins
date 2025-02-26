<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.cutowl.com/
 * @since      1.0.0
 *
 * @package    Lights_Off
 * @subpackage Lights_Off/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Lights_Off
 * @subpackage Lights_Off/includes
 * @author     Cutowl <contacts@cutowl.com>
 */
class Lights_Off_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		update_user_meta(get_current_user_id(), 'lightsoff_setting_select', 'default');
		update_user_meta(get_current_user_id(), 'lightsoff_setting_checkbox', 'false');
		update_user_meta(get_current_user_id(), 'lightsoff_setting_toggler', 'on');
	}

}
