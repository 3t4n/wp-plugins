<?php

/**
 * Fired during plugin activation
 *
 * @link       https://gleap.io
 * @since      1.0.0
 *
 * @package    Gleap
 * @subpackage Gleap/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Gleap
 * @subpackage Gleap/includes
 * @author     Gleap <hello@gleap.io>
 */
class Gleap_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        $custom_cap = 'report_feedback';
        $grant      = true;

        $roles = ['administrator', 'contributor', 'editor', 'author'];

        foreach ($roles as $roleName) {
            $role = get_role($roleName);
            if ($role && !$role->has_cap( $custom_cap )) {
                $role->add_cap( $custom_cap, $grant );
            }
        }
	}
}
