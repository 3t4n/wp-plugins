<?php
/**
 * The Admin functionality of the plugin.
 *
 * @link       http://wpbeginner.com
 * @since      1.0.0
 *
 * @package    YouTubeSubscribeBar
 * @subpackage YouTubeSubscribeBar/Plugin
 */
namespace YouTubeSubscribeBar\Plugin;

class YTSubscribeBarAdmin {

	/**
	 * Holds the admin menu name slug.
	 * @var string
	 */
	public $menu;

	/**
	 * Holds the plugin name slug.
	 * @var string
	 */
	public $plugin_slug;

	/**
	 * Holds the plugin name.
	 * @var string
	 */
	public $plugin_name;

	/**
	 *
	 */
	function __construct( $plugin_name, $plugin_slug ) {
		$this->plugin_name = $plugin_name;
		$this->plugin_slug = $plugin_slug;
		$this->amysb_init();
	}

	/**
	 * Register necessary plugin hooks and filters
	 */
	public function amysb_init() {
		// create the activation hook
		register_activation_hook( YT_SUB_BAR_FILE, [ $this, 'amysb_activation_hook' ] );

		// setup the settings page
		add_action( 'admin_menu', [ $this, 'amysb_menu' ] );

		// link to settings page
		add_filter( 'plugin_action_links_' . plugin_basename( YT_SUB_BAR_FILE ), [ $this, 'amysb_add_settings_link' ], 10, 2 );

		// admin notices
		add_action( 'admin_notices', [ $this, 'amysb_dashboard_notices' ] );

		// dismiss welcome notice ajax
		add_action( 'wp_ajax_' . $this->plugin_slug . '_dismiss_dashboard_notices', [ $this, 'amysb_dismiss_dashboard_notices' ] );

	}

	/**
	 * Show relevant notices for the plugin
	 */
	function amysb_dashboard_notices() {
		global $pagenow;

		if ( ! get_option( $this->plugin_slug . '_welcome' ) ) {
			if (
				! (
					$pagenow === 'options-general.php' &&
					// phpcs:ignore WordPress.Security.NonceVerification.Recommended
					isset( $_GET['page'] ) &&
					// phpcs:ignore WordPress.Security.NonceVerification.Recommended
					$_GET['page'] === $this->plugin_slug
				)
			) {
				$setting_page = admin_url( 'options-general.php?page=' . $this->plugin_slug );
				$ajax_url     = admin_url( 'admin-ajax.php' );
				// load the notices view
				include YT_SUB_BAR_PATH . 'views/activate_welcome_view.php';
			}
		}
	}

	/**
	 * Dismiss the welcome notice for the plugin
	 */
	function amysb_dismiss_dashboard_notices() {
		check_ajax_referer( $this->plugin_slug . '-nonce', 'nonce' );
		// user has dismissed the welcome notice
		update_option( $this->plugin_slug . '_welcome', 1 );
		exit;
	}

	/**
	 * Add a settings page link in the PLugins list page
	 */
	function amysb_add_settings_link( $action_links ) {
		$action_links['settings_page'] = '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_slug ) . '">' . __( 'Settings', 'youtube-subscribe-bar' ) . '</a>';
		return $action_links;
	}

	/**
	 * Creates a new menu page for creating a plugin setting page
	 */
	public function amysb_menu() {
		// a new admin page for the YT Subscribe bar settings
		$this->menu = add_options_page( $this->plugin_name, $this->plugin_name, 'administrator', $this->plugin_slug, [ $this, 'amysb_menu_cb' ] );

		// load admin styles based on the hook suffix
		if ( $this->menu ) {
			add_action( 'load-' . $this->menu, [ $this, 'amysb_assets' ] );
		}
	}

	/**
	 * Outputs the content for the YT Subscribe Bar settings page
	 */
	public function amysb_menu_cb() {
		if ( \current_user_can( 'administrator' ) ) {

			// form saved state
			$saved_state = 'no';

			// check nonce to process form data
			if ( isset( $_REQUEST['_wpnonce'] ) && wp_verify_nonce( $_REQUEST['_wpnonce'], 'youtube-subscribe-bar-settings-nonce' ) ) {

				// check if form submitted
				if (
					isset( $_REQUEST['submit'] ) &&
					isset( $_REQUEST['action'] ) &&
					'update' === $_REQUEST['action']
				) {

					$settings = [
						// YouTube specific settings
						'ytsb_channel_type'  => 'channel' === $_POST['ytsb_channel_type'] ? 'channel' : 'channelid', // Either 'channel' or 'channelid'.
						'ytsb_channel_id'    => sanitize_text_field( wp_unslash( $_POST['ytsb_channel_id'] ) ),
						'ytsb_button_layout' => 'full' === $_POST['ytsb_button_layout'] ? 'full' : 'default', // Either 'full' or 'default'.
						'ytsb_button_theme'  => 'dark' === $_POST['ytsb_button_theme'] ? 'dark' : 'default', // Either 'dark' or 'default'.
						'ytsb_button_count'  => 'hidden' === $_POST['ytsb_button_count'] ? 'hidden' : 'default', // Either 'hidden' or 'default'.
						// Plugin Specific settings
						'ytsb_text'          => sanitize_text_field( wp_unslash( $_POST['ytsb_text'] ) ),
						'ytsb_text_color'    => sanitize_hex_color( wp_unslash( $_POST['ytsb_text_color'] ) ),
						'ytsb_bg_color'      => sanitize_hex_color( wp_unslash( $_POST['ytsb_bg_color'] ) ),
					];

					if ( update_option( $this->plugin_slug . '-settings', $settings ) ) {
						$saved_state = 'yes';
					}
				}
			}

			// get the settings
			$settings = $this->amysb_get_settings();

			// render the view
			require YT_SUB_BAR_PATH . 'views/admin_view.php';
		}
	}

	/**
	 * Pull the asset dependencies and version from auto generated file.
	 *
	 * @return array Asset version and dependencies.
	 */
	public function asset_data() {
		static $asset_data = [];

		if ( ! empty( $asset_data ) ) {
			return $asset_data;
		}

		/*
		 * Data for JavaScript and CSS files.
		 *
		 * This pulls in the data generated by @wordpress/dependency-extraction-webpack-plugin.
		 *
		 * The version hash takes in to account both the JavaScript and CSS files that are generated
		 * so can safely be used for both.
		 */
		$asset_details_path = plugin_dir_path( YT_SUB_BAR_FILE ) . 'assets/build/admin.asset.php';

		// Fallback during development.
		$asset_data = [
			'dependencies' => [],
			'version'      => microtime(),
		];
		// Production/after build.
		if ( file_exists( $asset_details_path ) ) {
			$asset_data = include $asset_details_path;
		}

		return $asset_data;
	}

	/**
	 * hook all the necessary admin styles and scripts for this page
	 */
	public function amysb_assets() {
		add_action( 'admin_enqueue_scripts', [ $this, 'amysb_styles' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'amysb_scripts' ] );
	}

	/**
	 * Register and enqueue all the necessary admin styles
	 */
	public function amysb_styles() {
		wp_enqueue_style(
			$this->plugin_slug . '-admin',
			plugins_url( '/assets/build/admin.css', YT_SUB_BAR_FILE ),
			[],
			$this->asset_data()['version']
		);
	}

	/**
	 * Include all the necessary admin scripts
	 */
	public function amysb_scripts() {
		wp_enqueue_script(
			$this->plugin_slug . '-admin-js',
			plugins_url( '/assets/build/admin.js', YT_SUB_BAR_FILE ),
			array_merge( [ 'iris' ], $this->asset_data()['dependencies'] ),
			$this->asset_data()['version'],
			true
		);
	}

	/**
	 * Fired when the plugin is activated.
	 */
	public function amysb_activation_hook() {
		// get the settings
		$settings = get_option( $this->plugin_slug . '-settings' );

		// if settings not found, then set defaults
		if ( ! $settings ) {
			$settings = [
				// YouTube specific settings
				'ytsb_channel_type'  => 'channelid', // Either 'channel' or 'channelid'.
				'ytsb_channel_id'    => '',
				'ytsb_button_layout' => 'default', // Either 'full' or 'default'.
				'ytsb_button_theme'  => 'default', // Either 'dark' or 'default'.
				'ytsb_button_count'  => 'default', // Either 'hidden' or 'default'.
				// Plugin Specific settings
				'ytsb_text'          => 'Subscribe to my YouTube Channel',
				'ytsb_text_color'    => '#ffffff',
				'ytsb_bg_color'      => '#1b1b1b',
			];
			update_option( $this->plugin_slug . '-settings', $settings );
		}
	}

	/**
	 * Retrieve the plugin settings
	 *
	 * @returns $data Array Mixed
	 */
	public function amysb_get_settings() {
		return get_option( $this->plugin_slug . '-settings' );
	}
}
