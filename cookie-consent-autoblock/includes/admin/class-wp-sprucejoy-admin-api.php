<?php

/**
 * The WP_Sprucejoy Admin API Class.
 *
 * @package WP-SpruceJoy
 * @subpackage WP_Sprucejoy Admin API Object Class
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit();
}

class WP_Sprucejoy_Admin_API
{

	/**
	 * Container for tabs.
	 *
	 * @access public
	 * @var array
	 */
	public $tabs = array();


	/**
	 * Plugin initialization function.
	 *
	 */
	function __construct()
	{

		// Load dependencies.
		$this->load_dependencies();

		// Load admin hooks.
		$this->load_hooks();

		// The following is only needed if we are on the WP-SpruceJoy settings screen.
		$is_wpsprucejoy_admin = wpsprucejoy_get('page', false, 'get');
		if (false !== $is_wpsprucejoy_admin && 'wpsj-settings' == $is_wpsprucejoy_admin) {
			$tabs    = $this->default_tabs();    // Load default tabs.
		}

	}

	/**
	 * Load dependencies.
	 *
	 * @global object $wpsj
	 */
	function load_dependencies()
	{

		global $wpsj;

		include_once($wpsj->path . 'includes/admin/admin.php');
		include_once($wpsj->path . 'includes/admin/dialogs.php');
		include_once($wpsj->path . 'includes/admin/api.php');
		if ('wpsj-settings' == wpsprucejoy_get('page', false, 'get')) {
			include_once($wpsj->path . 'includes/admin/tabs/class-wp-sprucejoy-admin-tab-options.php');
		}
	}

	/**
	 * Load admin.
	 *
	 * @global object $wpsj
	 */
	function load_hooks()
	{
		global $wpsj;
		add_action( 'admin_enqueue_scripts',          array( $this, 'dashboard_enqueue_scripts' ) );
		add_action('wpsprucejoy_admin_do_tab',             array('WP_Sprucejoy_Admin_Tab_Options', 'do_tab'),  1);
		add_filter( 'plugin_action_links',            array( $this, 'plugin_links' ), 10, 2 );		
	} // End of load_hooks()

	/**
	 * Filter to add link to settings from plugin panel.
	 *
	 * @global object $wpsj
	 *
	 * @param  array  $links
	 * @param  string $file
	 * @return array  $links
	 */
	function plugin_links( $links, $file ) {
		global $wpsj;
		static $wpsprucejoy_plugin;
		if ( ! $wpsprucejoy_plugin ) {
			$wpsprucejoy_plugin = plugin_basename( $wpsj->path . '/wp-sprucejoy.php' );
		}
		if ( $file == $wpsprucejoy_plugin ) {
			$settings_link = '<a href="' . add_query_arg( 'page', 'wpsj-settings', 'options-general.php' ) . '">' . __( 'Settings', 'wp-sprucejoy' ) . '</a>';
			$links = array_merge( array( $settings_link ), $links );
		}
		return $links;
	}


	/**
	 * Display admin tabs.
	 *
	 * @param string $current The current tab being displayed (default: options).
	 */
	function do_tabs($current = 'options')
	{

		/**
		 * Filter the admin tabs for the plugin settings page.
		 *
		 *
		 * @param array $tabs An array of the tabs to be displayed on the plugin settings page.
		 */
		$this->tabs = apply_filters('wpsprucejoy_admin_tabs', $this->tabs);

		$links = array();
		foreach ($this->tabs as $tab => $name) {
			$link_args = array('page' => 'wpsj-settings', 'tab'  => $tab);
			$link = add_query_arg($link_args, admin_url('options-general.php'));
			$class = ($tab == $current) ? 'nav-tab nav-tab-active' : 'nav-tab';
			$links[] = sprintf('<a class="%s" href="%s">%s</a>', $class, $link, $name);
		}

		// echo '<h2 class="nav-tab-wrapper">';
		// foreach ( $links as $link ) {
		//	echo $link;
		// }
		// echo '</h2>';
	}

	function dashboard_enqueue_scripts( $hook ) {
		global $wpsj;
		wp_enqueue_style( 'wpmem-admin', $wpsj->url . 'assets/css/admin.css', '', $wpsj->version );
	}

	/**
	 * Settings for default tabs.
	 *
	 */
	function default_tabs()
	{
		$this->tabs = array(
			'options' => 'WP-SpruceJoy ' . __('Options', 'wp-sprucejoy'),
		);
	}



	/**
	 * Build admin panel form action url.
	 *
	 *
	 * @global string $pagenow
	 * @global string $plugin_page
	 * @global object $wpsj         The WP_Sprucejoy Object.
	 * @param  mixed  $args          Array of additional arguments|boolean. Default: false.
	 * @return string $url
	 */
	function form_post_url($args = false)
	{
		global $pagenow, $plugin_page, $wpsj;
		$tab = sanitize_text_field(wpsprucejoy_get('tab', false, 'get'));
		$params = array('page' => $plugin_page);
		if ($tab) {
			$params['tab'] = $tab;
		}
		if ($args) {
			foreach ($args as $key => $val) {
				$params[$key] = $val;
			}
		}
		$url = add_query_arg($params, admin_url($pagenow));
		return esc_url($url);
	}
} // End of WP_Sprucejoy_Admin_API class.

// End of file.