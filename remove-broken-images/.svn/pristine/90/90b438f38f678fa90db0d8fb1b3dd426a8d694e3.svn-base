<?php

// Don't load directly
if (!defined('ABSPATH')) { exit; }

class R34RBI {


	const NAME = 'Remove Broken Images';
	public $version = '';
	
	public $functions = array();
	public $settings = array();
	public $utilities = array();


	public function __construct() {

		// Set version
		$this->version = $this->_get_version();

		// Admin page
		//add_action('admin_menu', array(&$this, 'admin_page'), 10, 0);

		// Enqueue admin scripts
		add_action('admin_enqueue_scripts', array(&$this, 'admin_enqueue_scripts'), 10, 0);
		
		// Initialize
		add_action('init', array(&$this, 'enqueue_script'));

	}


	public function admin_enqueue_scripts() {
		wp_enqueue_style('r34rbi-admin-style', plugin_dir_url(__FILE__) . 'assets/admin-style-min.css', false, $this->version);
	}


	public function admin_page() {
		add_options_page(
			__('Remove Broken Images', 'remove-broken-images'),
			__('Remove Broken Images', 'remove-broken-images'),
			'manage_options',
			'remove-broken-images',
			array(&$this, 'admin_page_callback'),
			34
		);
	}
	

	public function admin_page_callback() {
		// Update settings
		if (isset($_POST['r34rbi-nonce']) && wp_verify_nonce($_POST['r34rbi-nonce'], 'r34rbi-admin')) {
		}
		
		// Load page template
		include_once(plugin_dir_path(__FILE__) . 'templates/admin/r34rbi-admin.php');
	}


	// Enqueue script
	public function enqueue_script() {
		// Don't do anything on admin/login pages
		if (is_admin() || is_login() || $this->is_block_editor()) { return; }
	
		wp_enqueue_script('r34rbi', plugin_dir_url(__FILE__) . 'assets/script.min.js', array('jquery'), $this->version, true);
		
		// Should we redirect instead of removing images?
		$redirect_on_missing_image = apply_filters('r34rbi_redirect_on_missing_image', false);
		if (
			$redirect_on_missing_image === true ||
			(
				is_string($redirect_on_missing_image) &&
				!($redirect_on_missing_image = wp_http_validate_url($redirect_on_missing_image))
			)
		)
		{ $redirect_on_missing_image = home_url('/'); }
		wp_add_inline_script('r34rbi', 'var r34rbi_redirect_on_missing_image = "' . $redirect_on_missing_image . '";');
	}


	// Detect if we're in the block editor
	public function is_block_editor() {
		if (function_exists('is_block_editor')) { return is_block_editor(); }
		if (function_exists('get_current_screen')) {
			$screen = get_current_screen();
			if ($screen && method_exists($screen, 'is_block_editor')) {
				return $screen->is_block_editor();
			}
		}
		return false;
	}


	// Get current plugin version
	private function _get_version() {
		if (!function_exists('get_plugin_data')) {
			require_once(ABSPATH . 'wp-admin/includes/plugin.php');
		}
		$plugin_data = get_plugin_data(dirname(__FILE__) . '/remove-broken-images.php', false, false);
		return $plugin_data['Version'];
	}
	
	
}