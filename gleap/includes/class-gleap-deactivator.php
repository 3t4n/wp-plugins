<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://gleap.io
 * @since      1.0.0
 *
 * @package    Gleap
 * @subpackage Gleap/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Gleap
 * @subpackage Gleap/includes
 * @author     Gleap <hello@gleap.io>
 */
class Gleap_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
        global $wp_roles;

        $delete_caps = array(
            'report_feedback'
        );

        foreach ($delete_caps as $cap) {
            foreach (array_keys($wp_roles->roles) as $role) {
                $wp_roles->remove_cap($role, $cap);
            }
        }
	}

}
