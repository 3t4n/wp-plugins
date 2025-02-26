<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://aarambhathemes.com/
 * @since      1.0.0
 *
 * @package    Aarambha_Kits
 * @subpackage Aarambha_Kits/admin
 * @author     Aarambha Themes <aarambhathemes@gmail.com>
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Aarambha_Kits
 * @subpackage Aarambha_Kits/admin
 * @author     Aarambha Themes <aarambhathemes@gmail.com>
 */
class Aarambha_Kits_Admin {

	/**
	 * The ID of this plugin.
	 * Used on slug of plugin menu.
	 * Used on Root Div ID for React too.
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
	 * Elementor minimum version
	 *
	 * @var string
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.5.0';

	/**
	 * PHP minimum version
	 *
	 * @var string
	 */
	const MINIMUM_PHP_VERSION = '5.4';

	/**
	 * The Rest route namespace.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $namespace    The Rest route namespace.
	 */
	private $namespace = 'aarambha-kits-setting-api/';

	/**
	 * The rest version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $rest_version    The rest version of this plugin..
	 */
	private $rest_version = 'v1';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Admin Notices
	 *
	 * Check if admin notice should be shown or not
	 *
	 * @since 1.4.5
	 * @access public
	 */
	public function notices() {

		$this->check_plugin();
	}

	/**
	 * Shows an admin notice when the free version is missing
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function check_plugin() {

		// Leave to Elementor Pro to manage this.
		if ( function_exists( 'elementor_pro_load_plugin' ) ) {
			return;
		}

		$message = '';

		// Elementor plugin check
		if ( ! did_action( 'elementor/loaded' ) ) {

			if ( file_exists( WP_PLUGIN_DIR . '/elementor/elementor.php' ) ) {

				if ( current_user_can( 'activate_plugins' ) ) {

					$button_link = wp_nonce_url( 'plugins.php?action=activate&plugin=elementor/elementor.php&plugin_status=all&paged=1', 'activate-plugin_elementor/elementor.php' );
					$button_text = '<p><a href="' . esc_url($button_link) . '" class="button-primary">' . esc_html__( 'Activate Elementor', 'aarambha-kits' ) . '</a></p>';
				}
			} else {

				if ( current_user_can( 'install_plugins' ) ) {

					$button_link = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
					$button_text = '<p><a href="' . esc_url($button_link) . '" class="button-primary">' . esc_html__( 'Install Elementor', 'aarambha-kits' ) . '</a></p>';
				}
			}

			$message = sprintf(
				/* translators: 1: Plugin name 2: Elementor */
				esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'aarambha-kits' ),
				'<strong>' . esc_html__( 'Aarambha Kits for Elementor', 'aarambha-kits' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'aarambha-kits' ) . '</strong>'
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p>%2$s</div>',
				wp_kses_post($message),
				wp_kses_post($button_text) 
			);

			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {

			if ( isset( $_GET['activate'] ) ) {
				unset( $_GET['activate'] );
			}
			$message = sprintf(
				/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'aarambha-kits' ),
				'<strong>' . esc_html__( 'Aarambha Kits for Elementor', 'aarambha-kits' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'aarambha-kits' ) . '</strong>',
				self::MINIMUM_ELEMENTOR_VERSION
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses_post($message) );

			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {

			if ( isset( $_GET['activate'] ) ) {
				unset( $_GET['activate'] );
			}
			$message = sprintf(
				/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'aarambha-kits' ),
				'<strong>' . esc_html__( 'Aarambha Kits for Elementor', 'aarambha-kits' ) . '</strong>',
				'<strong>' . esc_html__( 'PHP', 'aarambha-kits' ) . '</strong>',
				self::MINIMUM_PHP_VERSION
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses_post($message) );

			return;
		}
	}

	/**
	 * Add Admin Page Menu page.
	 *
	 * @since    1.0.0
	 */
	public function add_admin_menu() {

		add_menu_page(
			esc_html($this->plugin_name),
			esc_html__( 'Aarambha Kits', 'aarambha-kits' ),
			'manage_options',
			esc_html($this->plugin_name),
			array( $this, 'getting_started_template' ),
			'data:image/svg+xml;base64,' . base64_encode(
				'<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve">
	   <g id="XMLID_5_">
		   <polygon id="XMLID_11_" style="fill:#05273F;" points="3901.188,306.005 4004.878,455.985 3936.958,455.985 3867.228,355.125 
			   3833.268,306.005 3867.228,256.875 3936.958,156.015 4004.878,156.015 	"/>
		   <g id="XMLID_2_">
			   <polygon id="XMLID_3_" style="fill:#05273F;" points="3678.5,156.013 3471.122,455.987 3539.042,455.987 3678.5,254.259 
				   3817.959,455.987 3885.879,455.987 		"/>
			   <polygon id="XMLID_4_" style="fill:#05273F;" points="3678.5,328 3678.5,328 3590.021,455.987 3678.5,416.256 3678.5,416.256 
				   3766.98,455.987 		"/>
		   </g>
	   </g>
	   <polygon id="XMLID_10_" style="fill:#FFFFFF;" points="1200.115,306.005 1303.805,455.985 1235.885,455.985 1166.155,355.125 
		   1132.195,306.005 1166.155,256.875 1235.885,156.015 1303.805,156.015 "/>
	   <polygon id="XMLID_9_" style="fill:#FFFFFF;" points="2130,156.013 1922.622,455.987 1990.541,455.987 2130,254.259 
		   2269.459,455.987 2337.378,455.987 "/>
	   <polygon id="XMLID_8_" style="fill:#FFFFFF;" points="3042,242.007 3042,242.007 2953.52,369.993 3042,330.263 3042,330.263 
		   3130.48,369.993 "/>
	   <path id="XMLID_22116_" style="fill:#CDD0D4;" d="M306,17.25C146.53,17.25,17.25,146.53,17.25,306S146.53,594.75,306,594.75
		   S594.75,465.47,594.75,306S465.47,17.25,306,17.25z M252.66,404.84l-79.32,35.62l79.32-114.74l79.32,114.74L252.66,404.84z
			M377.68,440.46L252.66,259.62L127.64,440.46H66.75l185.91-268.92l185.91,268.92H377.68z M484.36,440.46l-62.51-90.42L391.41,306
		   l30.44-44.04l62.51-90.42h60.89L452.29,306l92.96,134.46H484.36z"/>
	   </svg>'
			),
			110
		);

		add_submenu_page(
			esc_html($this->plugin_name),
			esc_html__( 'Getting Started Page', 'aarambha-kits' ),
			esc_html__( 'Getting Started', 'aarambha-kits' ),
			'manage_options',
			esc_html($this->plugin_name),
			array( $this, 'getting_started_template' )
		);

		add_submenu_page(
			esc_html($this->plugin_name),
			esc_html__( 'Settings', 'aarambha-kits' ),
			esc_html__( 'Settings', 'aarambha-kits' ),
			'manage_options',
			esc_html($this->plugin_name) . '-settings',
			array( $this, 'settings_template' )
		);
	}

	/**
	 * Render Getting Started Template
	 *
	 * @return void
	 */
	public static function getting_started_template() {
		require_once AARAMBHA_KITS_PATH . 'admin/partials/aarambha-kits-admin-display.php';
	}

	/**
	 * Render Getting Started Template
	 *
	 * @return void
	 */
	public static function settings_template() {
		require_once AARAMBHA_KITS_PATH . 'admin/partials/aarambha-kits-admin-settings-display.php';
	}

	/**
	 * [get_styles] All Style
	 *
	 * @return [array]
	 */
	public function get_styles() {

		$style_list = array(

			$this->plugin_name => array(
				'src'     => AARAMBHA_KITS_URL . 'assets/build/css/main.css',
				'version' => AARAMBHA_KITS_VERSION,
				'deps'    => array( 'wp-components' ),
			),

		);
		return $style_list;
	}

	/**
	 * [get_scripts] All Script
	 *
	 * @return [array]
	 */
	public function get_scripts() {

		$script_list = array(
			$this->plugin_name          => array(
				'src'       => AARAMBHA_KITS_URL . 'assets/build/js/main.js',
				'version'   => AARAMBHA_KITS_VERSION,
				'deps'      => array( 'lodash', 'wp-api-fetch', 'wp-i18n', 'wp-components', 'wp-element' ),
				'condition' => array( 'aarambha-kits_page_aarambha-kits-settings' ),
			),
			'aarambha-kits-imageupload' => array(
				'src'     => AARAMBHA_KITS_URL . 'assets/build/js/imageupload.js',
				'version' => AARAMBHA_KITS_VERSION,
			),
		);

		return $script_list;

	}

	/**
	 * Register the CSS/JavaScript Resources for the admin area.
	 *
	 * Use Condition to Load it Only When it is Necessary
	 *
	 * @since    1.0.0
	 */
	public function enqueue_resources() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Aarambha_Kits_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Aarambha_Kits_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$screen = get_current_screen();

		if ( ! ( isset( $screen->base ) && in_array( $screen->base, array( 'toplevel_page_aarambha-kits', 'aarambha-kits_page_aarambha-kits-settings', 'widgets' ) ) ) ) {
			return;
		}

		$scripts = self::get_scripts();
		$styles  = self::get_styles();

		// Register Scripts
		wp_enqueue_media();

		foreach ( $scripts as $handle => $script ) {
			$deps = ( isset( $script['deps'] ) ? $script['deps'] : false );
			if ( isset( $script['condition'] ) && ( isset( $screen->base ) && in_array( $screen->base, $script['condition'] ) ) ) {
				wp_enqueue_script( $handle, $script['src'], $deps, $script['version'], true );
			} else {
				wp_enqueue_script( $handle, $script['src'], $deps, $script['version'], true );
			}

			// Localize Scripts
			$localize = array(
				'version' => $this->version,
				'root_id' => 'aarambha-kits-settings',
				'URL'     => AARAMBHA_KITS_URL,
				'rest'    => array(
					'namespace' => $this->namespace,
					'version'   => $this->rest_version,
				),
				'pro'     => ( aarambha_kits_pro_version() ) ? 'yes' : 'no',
			);
			wp_set_script_translations( $this->plugin_name, $this->plugin_name );
			wp_localize_script( $this->plugin_name, 'aarambhaKitsBuild', $localize );
		}
		// Register Styles
		foreach ( $styles as $handle => $style ) {
			$deps = ( isset( $style['deps'] ) ? $style['deps'] : false );
			wp_enqueue_style( $handle, $style['src'], $deps, $style['version'] );
		}
	}

	/**
	 * Register REST API route.
	 *
	 * @since    1.0.0
	 */
	public function register_routes() {
		$namespace = $this->namespace . $this->rest_version;

		register_rest_route(
			$namespace,
			'/set_settings',
			array(
				array(
					'methods'             => \WP_REST_Server::EDITABLE,
					'callback'            => array( $this, 'set_settings' ),
					'permission_callback' => function () {
						return ( current_user_can( 'edit_posts' ) && current_user_can( 'manage_options' ) );
					},
				),
			)
		);
		register_rest_route(
			$namespace,
			'/get_settings',
			array(
				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( $this, 'get_settings' ),
					'permission_callback' => function () {
						return current_user_can( 'manage_options' );
					},
				),
			)
		);
	}


	/**
	 * Function to fetch all options.
	 *
	 * @param WP_REST_Request $request Full details about the request.
	 * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
	 * @since 3.0.2
	 */
	public function set_settings( \WP_REST_Request $request ) {
		$params = $request->get_params();
		if ( isset( $params['settings'] ) ) {
			$settings = $params['settings'];
			aarambha_kits_delete_options();
			$g_options = aarambha_kits_get_options();
			foreach ( $settings as $key => $value ) {
				if (
					'block-element-1' == $key ||
					'block-element-2' == $key ||
					'block-element-3' == $key ||
					'block-element-4' == $key ||
					'block-element-5' == $key ||
					'block-element-6' == $key ||
					'block-element-7' == $key ||
					'block-element-8' == $key ||
					'block-element-9' == $key ||
					'block-element-10' == $key ||
					'block-element-11' == $key ||
					'block-element-12' == $key ||
					'block-element-13' == $key ||
					'block-element-14' == $key ||
					'block-element-15' == $key ||
					'block-element-16' == $key ||
					'block-element-17' == $key ||
					'block-element-18' == $key ||
					'block-element-19' == $key ||
					'block-element-20' == $key ||
					'block-element-21' == $key ||
					'block-widget-1' == $key ||
					'block-widget-2' == $key ||
					'block-widget-3' == $key ||
					'block-widget-4' == $key ||
					'block-widget-5' == $key ||
					'block-widget-6' == $key ||
					'block-widget-7' == $key ||
					'block-widget-8' == $key ||
					'block-widget-9' == $key
				) {
					$value = aarambha_kits_sanitize_checkbox( $value );
				} else {
					$value = sanitize_text_field( $value );
				}
				$g_options[ $key ] = $value;
			}
			do_action( 'set_aarambha_kits_options', $g_options );
			update_option( 'aarambha_kits_options', $g_options );
			return rest_ensure_response( aarambha_kits_get_options() );
		}
		return rest_ensure_response( aarambha_kits_get_options() );
	}

	/**
	 * Function to fetch all options.
	 *
	 * @param WP_REST_Request $request Full details about the request.
	 * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
	 * @since 1.0.1
	 */
	public function get_settings( \WP_REST_Request $request ) {
		return rest_ensure_response( aarambha_kits_get_options() );
	}

}
