<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://wordpress.org/plugins/auto-expire-posts/
 * @since      1.0.0
 *
 * @package    Auto_Expire_Posts
 * @subpackage Auto_Expire_Posts/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Auto_Expire_Posts
 * @subpackage Auto_Expire_Posts/public
 * @author     lerougeliet
 */
class Auto_Expire_Posts_Public {
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function expire_post($post_id) {
		$status = get_post_meta($post_id, 'auto_expire_posts_status', true);
		wp_update_post(array('ID' => $post_id, 'post_status' => $status));
		delete_post_meta($post_id, 'auto_expire_posts_date');
		delete_post_meta($post_id, 'auto_expire_posts_timezone');
		delete_post_meta($post_id, 'auto_expire_posts_status');
		update_post_meta($post_id, 'auto_expire_posts_expired', time());
	}
}
