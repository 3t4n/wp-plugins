<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class AZOADS_Admin_Menu {
	/**
	 * Instance of this class.
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * AZOADS_Admin_Menu constructor.
	 */
	private function __construct() {
		// add menu items.
		add_action( 'admin_menu', [ $this, 'add_plugin_admin_menu' ] );
	}

	/**
	 * Return an instance of this class.
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_menu() {

		// default capability
		$cap = 'manage_options';
		$access_roles = azoads_get_setting( 'misc_access_roles' );
		if ( ! empty( $access_roles ) ) {
			$current_user = wp_get_current_user();
			if ( in_array( 'administrator', $current_user->roles ) ) {
				$cap = 'manage_options';
			}
			elseif ( in_array( 'editor', $current_user->roles ) && in_array( 'editor', $access_roles ) ) {
				$cap = 'edit_pages';
			}
			elseif ( in_array( 'author', $current_user->roles ) && in_array( 'author', $access_roles ) ) {
				$cap = 'edit_posts';
			}
			elseif ( in_array( 'contributor', $current_user->roles ) && in_array( 'contributor', $access_roles ) ) {
				$cap = 'edit_posts';
			}


            if ( class_exists( 'WPSEO_Options' ) ) {
				if ( in_array( 'wpseo_manager', $current_user->roles ) && in_array( 'wpseo_manager', $access_roles ) ) {
					$cap = 'edit_pages'; 
				}
				elseif ( in_array( 'wpseo_editor', $current_user->roles ) && in_array( 'wpseo_editor', $access_roles ) ) {
					$cap = 'edit_posts'; 
				}
			}
		}

		add_menu_page(
			__( 'AZO Ads', 'azo-ads' ),
			'AZO Ads' . ( ( defined( 'AZOADS_PRO_VERSION' ) ? ' Pro' : '' ) ),
			$cap,
			AZOADS_SLUG,
			[ $this, 'display_overview_page' ],
			AZOADS_BASE_URL . '/assets/images/azo-ads-logo-white.svg',
			'58.74'
		);

		add_submenu_page(
			AZOADS_SLUG,
			__( 'Dashboard', 'azo-ads' ),
			__( 'Dashboard', 'azo-ads' ),
			$cap,
			AZOADS_SLUG,
			[ $this, 'display_overview_page' ]
		);

		// list ads page.
		add_submenu_page(
			AZOADS_SLUG,
			__( 'AZO Ads', 'azo-ads' ),
			__( 'Ads', 'azo-ads' ),
			$cap,
			AZOADS_SLUG . '-ads',
			[ $this, 'display_plugin_ads_page' ]
		);

		// add ads page.
		add_submenu_page(
			AZOADS_SLUG,
			__( 'AZO Manage Ads', 'azo-ads' ),
			__( 'Create & Manage', 'azo-ads' ),
			$cap,
			AZOADS_SLUG . '-manage',
			[ $this, 'display_plugin_ads_manage_page' ]
		);

		// add settings page.
		add_submenu_page(
			AZOADS_SLUG,
			__( 'AZO Ads Settings', 'azo-ads' ),
			__( 'Settings', 'azo-ads' ),
			$cap,
			AZOADS_SLUG . '-settings',
			[ $this, 'display_plugin_settings_page' ]
		);

		// add reports page.
		add_submenu_page(
			AZOADS_SLUG,
			__( 'AZO Ads Reports', 'azo-ads' ),
			__( 'Reports', 'azo-ads' ),
			$cap,
			AZOADS_SLUG . '-reports',
			[ $this, 'display_plugin_report_page' ]
		);

		// add support page.
		add_submenu_page(
			AZOADS_SLUG,
			__( 'AZO Ads Support', 'azo-ads' ),
			__( 'Support', 'azo-ads' ),
			$cap,
			AZOADS_SLUG . '-support',
			[ $this, 'display_plugin_support_page' ]
		);
		
		if ( ! defined( 'AZOADS_PRO_VERSION' ) ) {
			// add support page.
			add_submenu_page(
				AZOADS_SLUG,
				__( 'AZO Ads Upgrade', 'azo-ads' ),
				__( 'Upgrade to Pro', 'azo-ads' ),
				$cap,
				AZOADS_SLUG . '-upgrade',
				[ $this, 'display_plugin_upgrade_page' ]
			);
		}

	}

	/**
	 * Render the overview page
	 *
	 * @since    1.2.2
	 */
	public function display_overview_page() {

		include AZOADS_BASE_PATH . 'views/admin/overview.php';
	}

	/**
	 * Render the ads page
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_ads_page() {
		include AZOADS_BASE_PATH . 'views/admin/ads.php';
	}

	/**
	 * Render the ads manage page
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_ads_manage_page() {
		include AZOADS_BASE_PATH . 'views/admin/manage.php';
	}

	/**
	 * Render the settings page
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_settings_page() {
		include AZOADS_BASE_PATH . 'views/admin/settings.php';
	}

	/**
	 * Render the reports page
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_report_page() {
		include AZOADS_BASE_PATH . 'views/admin/reports.php';
	}

	/**
	 * Render the log page
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_log_page() {
		include AZOADS_BASE_PATH . 'views/admin/logs.php';
	}

	/**
	 * Render the support page
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_support_page() {

		include AZOADS_BASE_PATH . 'views/admin/support.php';
	}

	/**
	 * Render the upgrade to pro page
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_upgrade_page() {

		include AZOADS_BASE_PATH . 'views/admin/upgrade.php';
	}

}