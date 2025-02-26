<?php
defined( 'ABSPATH' ) || exit;
/**
 * Fired during plugin deactivation
 *
 * @link       Coming soon
 * @since      1.0.0
 *
 * @package    Ajaxify_Wp_Post_Comment_Form
 * @subpackage Ajaxify_Wp_Post_Comment_Form/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Ajaxify_Wp_Post_Comment_Form
 * @subpackage Ajaxify_Wp_Post_Comment_Form/includes
 * @author     Kairav Thakar <kairavthaker2016@gmail.com>
 */
class Ajaxify_Wp_Post_Comment_Form_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'ajaxify_wp_post_comments_form';
		$sql = "DROP TABLE IF EXISTS $table_name;";
		$wpdb->query($sql);
	}

}
