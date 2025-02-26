<?php
/*
Plugin Name: Fouita Smart Widgets
Description: Interact more with your customers, Fouita is the best way to power up your website with widgets, Integrate Fouita widgets into your wordpress website using only the project key from your dashboard. Try it now and create an authetic customer experience for your visitors!
Version: 1.0.0
Author: Fouita
Author URI: https://fouita.com/
*/

if (!class_exists('FouitaAddScripts')) {
	class FouitaAddScripts
	{
		private static $instance;

		private function __construct()
		{
			$this->constants();	// Defines any constants used in the plugin
			$this->init();	// Sets up all the actions and filters
		}

		public static function getInstance()
		{
			if (!self::$instance) {
				self::$instance = new FouitaAddScripts();
			}

			return self::$instance;
		}

		private function constants()
		{
			define('FOUITA_ADD_SCRIPTS_TEXT_DOMAIN', 'Fouita Widgets');
			define('FOUITA_ADD_SCRIPTS_SETTING_GET_PARAM', 'fouita-add-scripts-settings');
			define('FOUITA_ADD_SCRIPTS_INPUTS_PREFIX', 'fouita_add_scripts_');
			define('FOUITA_ADD_SCRIPTS_SCRIPTS_PREFIX', 'fouita_add_scripts_');
			define('FOUITA_ADD_SCRIPTS_INPUTS_GROUP', 'fouita-add-scripts-update-options');
		}

		private function init()
		{
			// Register the options with the settings API
			add_action('admin_init', array($this, 'admin_init'));

			// Public init
			add_action('init', array($this, 'public_init'));

			// Add the menu page
			add_action('admin_menu', array($this, 'setup_admin'));

			// admin scripts
			add_action('admin_enqueue_scripts', array($this, 'load_admin_assets'));
		}

		public function public_init()
		{
			add_action('wp_head', array($this, 'add_scripts'), 10);
		}

		public function load_admin_assets($hook)
		{
			$current_screen = get_current_screen();
			if (strpos($current_screen->base, FOUITA_ADD_SCRIPTS_SETTING_GET_PARAM) === false) {
				return;
			}
			wp_enqueue_style(FOUITA_ADD_SCRIPTS_SCRIPTS_PREFIX . 'boot_core_css', plugins_url('Includes/Admin/core.css', __FILE__));
			wp_enqueue_style(FOUITA_ADD_SCRIPTS_SCRIPTS_PREFIX . 'boot_admin_css', plugins_url('Includes/Admin/admin.css', __FILE__));
		}

		/**
		 * Add GA code if has in settings
		 */
		public function add_scripts()
		{
			if (
				get_option(FOUITA_ADD_SCRIPTS_INPUTS_PREFIX . 'id')
				&& trim(get_option(FOUITA_ADD_SCRIPTS_INPUTS_PREFIX . 'id')) != ''
			) {

				// echo to theme
?>
				<script type="module">
					var key = "<?php echo esc_attr(get_option(FOUITA_ADD_SCRIPTS_INPUTS_PREFIX . 'id')); ?>";
					import Fouita from 'https://cdn.fouita.com/assets/fouita/fouita-v1.js';
					Fouita({
						key: key,
						spa: true,
						prefix: '/'
					})
				</script>

<?php


			}
		}

		public function admin_init()
		{
			if (!is_admin()) {
				wp_die('This code is for admin area only');
			}

			register_setting(FOUITA_ADD_SCRIPTS_INPUTS_GROUP, FOUITA_ADD_SCRIPTS_INPUTS_PREFIX . 'id');
		}

		public function setup_admin()
		{
			// add settings page
			add_options_page(__('Add Scripts Plugin', FOUITA_ADD_SCRIPTS_TEXT_DOMAIN), __('Fouita Widgets', FOUITA_ADD_SCRIPTS_TEXT_DOMAIN), 'administrator', FOUITA_ADD_SCRIPTS_SETTING_GET_PARAM, array($this, 'admin_page'));
		}

		/**
		 * Admin settings page
		 */
		public function admin_page()
		{
			require 'Includes/Admin/SettingsForm.php';
		}
	}

	$s = FouitaAddScripts::getInstance();
}
