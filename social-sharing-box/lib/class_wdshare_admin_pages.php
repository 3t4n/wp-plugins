<?php
/**
 * Handles all Admin access functionality.
 */
class wdshare_AdminPages {

	var $data;

	function wdshare_AdminPages () { $this->__construct(); }

	function __construct () {
		$this->data = new wdshare_Options;
	}

	/**
	 * Main entry point.
	 *
	 * @static
	 */
	function serve () {
		$me = new wdshare_AdminPages;
		$me->add_hooks();
	}

	function create_site_admin_menu_entry () {
		if (@$_POST && isset($_POST['option_page']) && 'wdshare' == @$_POST['option_page']) {
			if (isset($_POST['wdshare'])) {
				$services = $_POST['wdshare']['services'];
				$services = is_array($services) ? $services : array();
				if (@$_POST['wdshare']['new_service']['name'] && @$_POST['wdshare']['new_service']['code']) {
					$services[] = $_POST['wdshare']['new_service'];
					unset($_POST['wdshare']['new_service']);
				}
				foreach ($services as $key=>$service) {
					$services[$key]['code'] = stripslashes($service['code']);
				}
				$_POST['wdshare']['services'] = $services;
				$this->data->set_options($_POST['wdshare']);
			}
			$goback = add_query_arg('settings-updated', 'true',  wp_get_referer());
			wp_redirect($goback);
		}
		$page = WP_NETWORK_ADMIN ? 'settings.php' : 'options-general.php';
		$perms = WP_NETWORK_ADMIN ? 'manage_network_options' : 'manage_options';
		add_submenu_page($page, 'Social Sharing Box', 'Social Sharing Box', $perms, 'wdshare', array($this, 'create_admin_page'));
	}

	function register_settings () {
		$form = new wdshare_AdminFormRenderer;

		register_setting('wdshare', 'wdshare');
		add_settings_section('wdshare_settings', __('Select the services you want to display on your social media box and click `Save Changes` to activate the plugin.', 'wdshare'), create_function('', ''), 'wdshare_options_page');
		add_settings_field('wdshare_services', __('Services', 'wdshare'), array($form, 'create_services_box'), 'wdshare_options_page', 'wdshare_settings');
		add_settings_field('wdshare_custom_service', __('Add new Custom Service', 'wdshare'), array($form, 'create_custom_service_box'), 'wdshare_options_page', 'wdshare_settings');
		add_settings_field('wdshare_appearance', __('Appearance', 'wdshare'), array($form, 'create_appearance_box'), 'wdshare_options_page', 'wdshare_settings');
		add_settings_field('wdshare_min_width', __('Minimum width', 'wdshare'), array($form, 'create_min_width_box'), 'wdshare_options_page', 'wdshare_settings');
		add_settings_field('wdshare_top_offset', __('Top offset', 'wdshare'), array($form, 'create_top_offset_box'), 'wdshare_options_page', 'wdshare_settings');
		add_settings_field('wdshare_horizontal_offset', __('Horizontal offset', 'wdshare'), array($form, 'create_horizontal_offset_box'), 'wdshare_options_page', 'wdshare_settings');

		add_settings_section('wdshare_advanced', __('Advanced settings', 'wdshare'), create_function('', ''), 'wdshare_options_page');
		add_settings_field('wdshare_advanced_box', __('Advanced', 'wdshare'), array($form, 'create_advanced_box'), 'wdshare_options_page', 'wdshare_advanced');
		add_settings_field('wdshare_css', __('Additional CSS', 'wdshare'), array($form, 'create_css_box'), 'wdshare_options_page', 'wdshare_advanced');
	}

	function create_admin_page () {
		include(wdshare_PLUGIN_BASE_DIR . '/lib/forms/plugin_settings.php');
	}

	function css_print_styles () {
		if (!isset($_GET['page']) || 'wdshare' != $_GET['page']) return false;
		wp_enqueue_style('wdshare-admin', wdshare_PLUGIN_URL . "/css/wdshare-admin.css");
	}

	function js_print_scripts () {
		if (!isset($_GET['page']) || 'wdshare' != $_GET['page']) return false;
		wp_enqueue_script( array("jquery", "jquery-ui-core", "jquery-ui-sortable", 'jquery-ui-dialog') );
	}

	function add_hooks () {
		// Step0: Register options and menu
		add_action('admin_init', array($this, 'register_settings'));
		add_action('network_admin_menu', array($this, 'create_site_admin_menu_entry'));
		add_action('admin_menu', array($this, 'create_site_admin_menu_entry'));

		add_action('admin_print_scripts', array($this, 'js_print_scripts'));
		add_action('admin_print_styles', array($this, 'css_print_styles'));
	}
}