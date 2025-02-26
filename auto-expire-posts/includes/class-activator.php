<?php

/**
 * Fired during plugin activation
 *
 * @link       https://wordpress.org/plugins/auto-expire-posts/
 * @since      1.0.0
 *
 * @package    Auto_Expire_Posts
 * @subpackage Auto_Expire_Posts/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Auto_Expire_Posts
 * @subpackage Auto_Expire_Posts/includes
 * @author     lerougeliet
 */
class Auto_Expire_Posts_Activator {
	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		add_option('auto_expire_posts_options', array(
			'default_status' => 'private',
		));
	}
}
