<?php
/**
 * Admin AZO Ads Class
 *
 * @package   AZO_Ads
 * @author    AZO Team <support@azonow.com>
 * @license   GPL-2.0+
 * @link      https://azonow.com
 * @copyright since 2023 AZO Team
 *
 */
class AZOADS_Admin {

	/**
	 * Instance of this class.
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Instance of admin notice class.
	 *
	 * @var      object $notices
	 */
	protected $notices = null;

	/**
	 * Slug of the settings page
	 *
	 * @var      string $plugin_screen_hook_suffix
	 */
	public $plugin_screen_hook_suffix = null;

	/**
	 * General plugin slug
	 *
	 * @var     string
	 */
	protected $plugin_slug = 'azo-ads';

	/**
	 * Admin settings.
	 *
	 * @var      array
	 */
	protected static $admin_settings = null;

	/**
	 * Initialize the plugin by loading admin scripts & styles and adding a
	 * settings page and menu.
	 */
	private function __construct() {
		if ( wp_doing_ajax() ) {
			// new AZO_Ads_Ad_Ajax_Callbacks();
			// add_action( 'plugins_loaded', [ $this, 'wp_plugins_loaded_ajax' ] );
		} else {
			add_action( 'plugins_loaded', [ $this, 'wp_plugins_loaded' ] );
			add_filter( 'admin_footer_text', [ $this, 'admin_footer_text' ], 100 );
		}
	}

	/**
	 * Return an instance of this class.
	 *
	 * @return	object	A single instance of this class.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
	
	/**
	 * Actions and filter available after all plugins are initialized.
	 */
	public function wp_plugins_loaded() {

		// load admin style sheet and javascript.
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_styles' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_scripts' ], 9 );

		AZOADS_Admin_Menu::get_instance();
	}

	/**
	 * Enqueue admin stylesheet.
	 */
	public function enqueue_admin_styles() {
		$screen = get_current_screen();

		if ( strpos( $screen->id, $this->plugin_slug ) !== FALSE ) {
			// select2
			wp_enqueue_style( $this->plugin_slug . '-admin-select2-style', AZOADS_BASE_URL . 'assets/css/admin/select2.min.css', [], AZOADS_VERSION );

			if ( strpos( $screen->id, $this->plugin_slug . '-ads' ) !== FALSE || strpos( $screen->id, $this->plugin_slug . '-reports' ) !== FALSE ) { // listing ads page && report page
				// datatables
				wp_enqueue_style( $this->plugin_slug . '-admin-datatables-style', AZOADS_BASE_URL . 'assets/css/admin/datatables.min.css', [], AZOADS_VERSION );
			}

			wp_enqueue_style( $this->plugin_slug . '-admin-apps-style', AZOADS_BASE_URL . 'assets/css/admin/apps.min.css', [], AZOADS_VERSION );

			wp_enqueue_style( $this->plugin_slug . '-admin-style', AZOADS_BASE_URL . 'assets/css/admin/admin.css', [], AZOADS_VERSION );
		}

		wp_enqueue_style( $this->plugin_slug . '-global-style', AZOADS_BASE_URL . 'assets/css/admin/global.css', [], AZOADS_VERSION );
	}

	/**
	 * Enqueue admin javaScript.
	 */
	public function enqueue_admin_scripts() {
		$screen = get_current_screen();
		
		if ( strpos( $screen->id, $this->plugin_slug ) !== FALSE ) {
			// select2
			wp_enqueue_script( $this->plugin_slug . '-admin-select2-js', AZOADS_BASE_URL . 'assets/js/admin/select2.min.js', [], AZOADS_VERSION, true );

			if ( strpos( $screen->id, $this->plugin_slug . '-ads' ) !== FALSE || strpos( $screen->id, $this->plugin_slug . '-reports' ) !== FALSE ) { // listing ads page && report page
				// datatables
				wp_enqueue_script( $this->plugin_slug . '-admin-datatables-js', AZOADS_BASE_URL . 'assets/js/admin/datatables.min.js', [], AZOADS_VERSION, true );
			}
			elseif ( strpos( $screen->id, $this->plugin_slug . '-manage' ) !== FALSE ) { // manage ads page
				// WordPress media uploader scripts
				if ( ! did_action( 'wp_enqueue_media' ) ) {
					wp_enqueue_media();
				}
			}

			// apps js script.
			wp_enqueue_script( $this->plugin_slug . '-admin-apps-js', AZOADS_BASE_URL . 'assets/js/admin/apps.min.js', [], AZOADS_VERSION, false );

			// global js script.
			wp_enqueue_script( $this->plugin_slug . '-admin-main-js', AZOADS_BASE_URL . 'assets/js/admin/main.js', [], AZOADS_VERSION, true );
			if ( defined( 'AZOADS_PRO_VERSION' ) ) {
				wp_enqueue_script( $this->plugin_slug . '-admin-main-pro-js', AZOADS_PRO_BASE_URL . 'assets/js/admin/main.js', [], AZOADS_VERSION, true );
			}

			// azo ads ajax init
			wp_localize_script( $this->plugin_slug . '-admin-main-js', 'azoads_ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	
			// register ajax nonce.
			$params = [
				'ajax_nonce' => wp_create_nonce( 'azo-ads-admin-ajax-nonce' ),
			];
			wp_localize_script( $this->plugin_slug . '-admin-global-script', 'azoadsglobal', $params );
		}
	}

	/**
	 * Rewrite WordPress text in Footer
	 *
	 * @param String $default_text The default footer text.
	 *
	 * @return string
	 */
	public function screen_belongs_to_AZO_ads() {

		if ( ! function_exists( 'get_current_screen' ) ) return false;

		$screen = get_current_screen();
		if ( ! isset( $screen->id ) ) return false;

		return in_array( $screen->id, array(
			'toplevel_page_azo-ads',
			'azo-ads_page_azo-ads-ads',
			'azo-ads_page_azo-ads-manage',
			'azo-ads_page_azo-ads-settings',
			'azo-ads_page_azo-ads-reports',
			'azo-ads_page_azo-ads-support',
			'azo-ads_page_azo-ads-upgrade',
		) );
	}

	/**
	 * Rewrite WordPress text in Footer
	 *
	 * @param String $default_text The default footer text.
	 *
	 * @return string
	 */
	public function admin_footer_text( $default_text ) {
		if ( $this->screen_belongs_to_AZO_ads() ) {
			return 'Please consider leaving us &#9733;&#9733;&#9733;&#9733;&#9733; review on <a href="https://wordpress.org/support/plugin/azo-ads/reviews/" target="_blank">wordpress.org</a>. Thank you.';
		}

		return $default_text;
	}
}