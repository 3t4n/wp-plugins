<?php
/**
 * Register menus WordPress Admin things.
 *
 * @package WPEG_Admin
 * @since 1.0.0
 */

/**
 * WPEG Admin
 */
class WPEG_Admin {
	/**
	 * Check if has been initialized or not yet.
	 *
	 * @var boolean
	 */
	private static $initiated = false;

	/**
	 * Initialization.
	 *
	 * @return void
	 */
	public static function init() {
		if ( ! self::$initiated ) {
			self::setup_all();
		}
	}

	/**
	 * Admin init.
	 *
	 * @return void
	 */
	public static function admin_init() {
		if ( get_option( 'wpeg_plugin_activation', false ) ) {
			delete_option( 'wpeg_plugin_activation' );
			wp_redirect( admin_url( 'admin.php?page=wpeg%2Fabout' ) );
			exit;
		}

		do_action( 'wpeg-set_login' );
	}

	/**
	 * Initializes All WordPress hooks.
	 *
	 * @static
	 */
	private static function setup_all() {
		self::$initiated = true;

		// Add caldera forms types: envato purchase item list.
		add_action( 'admin_menu', array( 'WPEG_Admin', 'admin_menu' ) );

		// Add admin footer content for wpeg botttom-bar tool.
		add_action( 'admin_footer', array( 'WPEG_Admin', 'admin_footer' ) );
		add_action( 'customize_controls_print_footer_scripts', array( 'WPEG_Admin', 'admin_footer' ) );

		// Register admin styles and javasripts.
		add_action( 'admin_enqueue_scripts', array( 'WPEG_Admin', 'admin_enqueue_scripts' ) );

		// Add Link to admin bar.
		add_action( 'admin_bar_menu', array( 'WPEG_Admin', 'admin_bar_link' ), 999 );
	}

	/**
	 * Load languages
	 *
	 * @return void
	 */
	public static function plugins_loaded() {
		load_plugin_textdomain( 'wpeg', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Register admin menus.
	 *
	 * @return void
	 */
	public static function admin_menu() {
		add_menu_page(
			__( 'WP Easy Guide', 'wpeg' ),
			__( 'WPEG', 'wpeg' ),
			'manage_options',
			'wpeg',
			array( 'WPEG_Admin', 'manage_view' ),
			plugin_dir_url( __FILE__ ) . 'assets/img/logo-icon-bw.svg',
			'67.00000000123'
		);

		// About.
		add_submenu_page(
			'wpeg',
			'Getting started WP Easy Guide',
			'Getting started',
			'manage_options',
			'wpeg/about',
			array( 'WPEG_Admin', 'about_view' )
		);

		// Manage.
		add_submenu_page(
			'wpeg',
			'Manage Guides &lsaquo; WP Easy Guide',
			'Manages',
			'manage_options',
			'wpeg/manages',
			array( 'WPEG_Admin', 'manage_view' )
		);

		// Remove first unnecessary submenu.
		remove_submenu_page( 'wpeg', 'wpeg' );

		do_action( 'wpeg-admin_menu' );
	}

	/**
	 * Add content in footer.
	 *
	 * @return void
	 */
	public static function admin_footer() {
		$screen = get_current_screen();

		if ( 'customize' === $screen->id ) {
			self::script_loader( false );
		}

		echo wp_kses_post( '<div id="wpeg-tool"></div>' );
	}

	/**
	 * Script loader
	 *
	 * @param boolean $in_footer Whether script load in footer or not.
	 * @return void
	 */
	public static function script_loader( $in_footer = true ) {
		// Load scripts check whether it's development or not.
		$js_path = WPEG_PLUGIN_URL . 'assets/js/wpeg.min.js';
		if ( defined( 'WPEG_DEVELOP' ) && true === WPEG_DEVELOP ) {
			$js_path = 'http://localhost:3000/static/js/bundle.js';
		}

		$lang          = array_change_key_case( (array) new WPEG_Lang(), CASE_UPPER );
		$in_footer     = true;
		$native_guides = self::get_native_guides();
		$safe_url      = str_replace(
			array(
				':',
				'/',
				'.',
			), ' ', site_url()
		);

		wp_enqueue_script( 'wpeg-script', $js_path, array(), null, $in_footer );

		$is_after_login = false;
		$is_after_login = apply_filters( 'wpeg-after_login', $is_after_login );

		$after_login_url = 'plugin/wpeg/login';
		$after_login_url = apply_filters( 'wpeg-after_login_url', $after_login_url );

		$step_enable = array_change_key_case(
			array(
				'Click' => true,
				'Tooltip' => true,
				'Input' => false,
				'Modal' => false,
			), CASE_UPPER
		);
		$step_enable = apply_filters( 'wpeg-filter_step_enable', $step_enable );

		wp_localize_script(
			'wpeg-script', 'wpeg', array(
				'afterLogin' => $is_after_login ? 'true' : 'false',
				'afterLoginUrl' => $after_login_url,
				'restUrl'    => rest_url( 'wpeg/v1' ),
				'stepEnable' => $step_enable,
				'siteUrl'    => site_url(),
				'siteId'     => sanitize_title( $safe_url ),
				'lang'       => $lang,
				'guides'     => $native_guides,
			)
		);

		wp_enqueue_editor();
	}

	/**
	 * Register styles and javascripts in envascout admin menu.
	 *
	 * @return void
	 */
	public static function admin_enqueue_scripts() {
		$screen = get_current_screen();

		wp_enqueue_style( 'wpeg-styles', WPEG_PLUGIN_URL . 'assets/css/styles.min.css', array(), null );

		if ( 'customize' === $screen->id ) {
			return;
		}

		self::script_loader();
	}

	/**
	 * About renderer.
	 *
	 * @return void
	 */
	public static function about_view() {
		WPEG::view( 'about' );
	}

	/**
	 * Manages renderer.
	 *
	 * @return void
	 */
	public static function manage_view() {
		WPEG::view( 'manage' );
	}

	/**
	 * Import / Export renderer.
	 *
	 * @return void
	 */
	public static function import_export_view() {
		WPEG::view( 'import-export' );
	}

	/**
	 * Register admin bar links.
	 *
	 * @return void
	 */
	public static function admin_bar_link() {
		global $wp_admin_bar, $wpdb;

		do_action( 'wpeg-admin_bar' );

		$guide_list = $wpdb->get_results( 'SELECT ID, title FROM ' . $wpdb->prefix . WPEG::$guide_table . ' WHERE active=1 AND ID in ( SELECT DISTINCT guide_ID FROM ' . $wpdb->prefix . WPEG::$step_table . ' ) ', ARRAY_A );// WPCS: unprepared SQL OK.

		$wp_admin_bar->add_menu(
			array(
				'parent' => false,
				'id'     => 'wpeg_admin_bar',
				'title'  => 'WP Easy Guide',
				'meta'   => false,
			)
		);

		$wp_admin_bar->add_menu(
			array(
				'parent' => 'wpeg_admin_bar',
				'id'     => 'guide_list',
				'title'  => 'Guide list',
				'href'   => '#',
				'meta'   => array(
					'class' => 'wpeg-guidelist',
				),
			)
		);

		$wp_admin_bar->add_menu(
			array(
				'parent' => 'wpeg_admin_bar',
				'id'     => 'create_new_guide',
				'title'  => 'Create a New Guide',
				'href'   => '#',
				'meta'   => array(
					'onclick' => 'javascript:void(WPEG && WPEG.newGuide());return false;',
				),
			)
		);

		foreach ( $guide_list as $guide ) {
			$wp_admin_bar->add_menu(
				array(
					'parent' => 'guide_list',
					'id'     => 'guide_' . $guide['ID'],
					'title'  => $guide['title'],
					'href'   => '#',
					'meta'   => array(
						'class'   => 'wpeg-submenu',
						'onclick' => 'javascript:void(WPEG && WPEG.viewGuide(' . $guide['ID'] . '));return false;',
					),
				)
			);
		}
	}

	/**
	 * Get guide list in activated plugins directory.
	 *
	 * @return array
	 */
	private static function get_plugins_guide() {
		$active_plugins = array();
		$list           = array();

		// WordPress Multisite.
		if ( is_multisite() ) {
			$active_plugins = get_blog_option( get_current_blog_id(), 'active_plugins' );
			foreach ( get_site_option( 'active_sitewide_plugins' ) as $plugin_path => $val ) {
				$active_plugins[] = $plugin_path;
			}
		} else {
			$active_plugins = get_option( 'active_plugins' );
		}

		foreach ( $active_plugins as $plugin ) {
			$onboarding_dir = plugin_dir_path( WP_PLUGIN_DIR . '/' . $plugin ) . 'onboarding';

			if ( file_exists( $onboarding_dir ) ) {
				$plugin_dir = dirname( $plugin );
				$wpeg_files = array();
				$files      = list_files( $onboarding_dir );

				foreach ( $files as $file ) {
					$pathinfo = pathinfo( $file );

					if ( 'wpeg' === $pathinfo['extension'] ) {
						$wpeg_files[] = $file;
					}
				}

				$list[ $plugin_dir ] = $wpeg_files;
			}
		}

		return $list;
	}

	/**
	 * Get theme list in current activated theme.
	 *
	 * @return string|null
	 */
	private static function get_theme_guide() {
		$onboarding_dir = get_stylesheet_directory() . '/onboarding';
		$wpeg_files     = array();

		if ( file_exists( $onboarding_dir ) ) {
			$files = list_files( $onboarding_dir );

			foreach ( $files as $file ) {
				$pathinfo = pathinfo( $file );

				if ( 'wpeg' === $pathinfo['extension'] ) {
					$wpeg_files[] = $file;
				}
			}
		}

		return $wpeg_files;
	}

	/**
	 * Get guide list from active plugins and current theme.
	 *
	 * @return array
	 */
	private static function get_native_guides() {
		$guide_files = array(
			'plugin' => self::get_plugins_guide(),
			'theme'  => array(),
		);

		// Add theme file to list.
		$theme_guide = self::get_theme_guide();
		if ( $theme_guide ) {
			$theme_slug                          = get_stylesheet();
			$guide_files['theme'][ $theme_slug ] = $theme_guide;
		}

		$guides = array(
			'plugin' => array(),
			'theme'  => array(),
		);

		$valid_guide_keys = array( 'title', 'description', 'steps' );
		$valid_step_keys  = array( 'title', 'description', 'action', 'type', 'selector', 'uri' );
		$syntax           = array(
			'$site' => site_url(),
		);

		foreach ( $guide_files as $type => $list ) {
			foreach ( $list as $name => $item ) {
				$guides[ $type ][ $name ] = array();

				foreach ( $item as $index => $file ) {
					$title    = sanitize_key( basename( $file, '.wpeg' ) );
					$json_str = file_get_contents( $file );
					$json     = (array) json_decode( $json_str );

					if ( $json ) {
						// Filter guide keys.
						foreach ( $json as $key => $item ) {
							if ( ! in_array( $key, $valid_guide_keys ) ) {
								unset( $json[ $key ] );
							}
						}

						// Filter step keys.
						foreach ( (array) $json['steps'] as $index => $item ) {
							$step = (array) $item;
							foreach ( $step as $key => $item ) {
								if ( ! in_array( $key, $valid_step_keys ) ) {
									unset( $step[ $key ] );
								} else {
									// Replace syntax.
									if ( null !== $item ) {
										$step[ $key ] = str_replace( array_keys( $syntax ), array_values( $syntax ), $item );
									}
								}
							}

							// Add additional ID.
							$step['ID'] = $index;

							$json['steps'][ $index ] = $step;
						}

						$guides[ $type ][ $name ][ $title ] = $json;
					}
				}
			}
		}

		return $guides;
	}
}
