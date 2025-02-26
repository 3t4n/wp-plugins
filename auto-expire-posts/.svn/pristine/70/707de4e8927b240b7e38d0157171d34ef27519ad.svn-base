<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wordpress.org/plugins/auto-expire-posts/
 * @since      1.0.0
 *
 * @package    Auto_Expire_Posts
 * @subpackage Auto_Expire_Posts/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Auto_Expire_Posts
 * @subpackage Auto_Expire_Posts/admin
 * @author     lerougeliet
 */
class Auto_Expire_Posts_Admin {
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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Auto_Expire_Posts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Auto_Expire_Posts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_register_style('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
		wp_enqueue_style('jquery-ui');
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'main.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Auto_Expire_Posts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Auto_Expire_Posts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script($this->plugin_name . 'main', plugin_dir_url(__FILE__) . 'main.js', array('jquery', 'jquery-ui-datepicker'), $this->version, true);
	}

	public function add_plugin_menu() {
		add_options_page('Auto Expire Posts Options', 'Auto Expire Posts', 'manage_options', 'auto-expire-posts', array(&$this, 'auto_expire_posts_options'));
	}

	public function auto_expire_posts_options() {
		if (!current_user_can('manage_options'))  {
			wp_die(__('You do not have sufficient permissions to access this page.'));
		}

		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/options.php';
	}

	public function add_action_links($links) {
		//$links[] = '<a href="' . admin_url('options-general.php?page=auto-expire-posts') . '">Options</a>';
		$links[] = '<a href="https://wordpress.org/support/plugin/auto-expire-posts/reviews/#new-post">Review</a>';
		return $links;
	}

	public function add_meta_box() {
		add_meta_box(
			'auto_expire_posts_metabox',
			'Expiration',
			['Auto_Expire_Posts_Admin', 'metabox'],
			'post'
		);
	}

	public function metabox($post) {
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/metabox.php';
	}

	public function save_meta_box($post_id) {
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    	return;
    }

		if (!empty($_POST['auto_expire_posts_date']) && !empty($_POST['auto_expire_posts_time'])
			&& !empty($_POST['auto_expire_posts_timezone'])
			&& !empty($_POST['auto_expire_posts_status'])) {
			if ($_POST['auto_expire_posts_status'] === 'disabled') {
				if (wp_get_schedule('auto_expire_posts_cron', array($post_id))) {
					wp_clear_schedule('auto_expire_posts_cron', array($post_id));
				}
				delete_post_meta($post_id, 'auto_expire_posts_date');
				delete_post_meta($post_id, 'auto_expire_posts_timezone');
				delete_post_meta($post_id, 'auto_expire_posts_status');
			} elseif (array_key_exists($_POST['auto_expire_posts_status'], Auto_Expire_Posts::$statuses)) {
				$sign = $POST['auto_expire_posts_timezone'] >= 0 ? '-' : '+';
				$time = strtotime("$_POST[auto_expire_posts_date] $_POST[auto_expire_posts_time] $sign$_POST[auto_expire_posts_timezone]");
				if ($time && $time > time()) {
					update_post_meta($post_id, 'auto_expire_posts_date', $time);
					update_post_meta($post_id, 'auto_expire_posts_timezone',
						intval($_POST['auto_expire_posts_timezone']));
					update_post_meta($post_id, 'auto_expire_posts_status',
						sanitize_text_field($_POST['auto_expire_posts_status']));

					if (wp_get_schedule('auto_expire_posts_cron', array($post_id))) {
						wp_clear_schedule('auto_expire_posts_cron', array($post_id));
					}
					wp_schedule_single_event($time, 'auto_expire_posts_cron', array($post_id));
				}
			}
		}
	}
}
