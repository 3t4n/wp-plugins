<?php // phpcs:ignore Class file names should be based on the class name with "class-" prepended.
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.acmeit.org/
 * @since      1.0.0
 *
 * @package    Frase
 * @subpackage Frase/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Frase
 * @subpackage Frase/admin
 * @author     codersantosh <codersantosh@gmail.com>
 */
class Frase_Admin {

	/**
	 * Menu info.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array    $menu_info    Admin menu information.
	 */
	private $menu_info;

	/**
	 * Gets an instance of this object.
	 * Prevents duplicate instances which avoid artefacts and improves performance.
	 *
	 * @static
	 * @access public
	 * @return object
	 * @since 1.0.0
	 */
	public static function get_instance() {
		// Store the instance locally to avoid private static replication.
		static $instance = null;

		// Only run these methods if they haven't been ran previously.
		if ( null === $instance ) {
			$instance = new self();
		}

		// Always return the instance.
		return $instance;
	}

	/**
	 * Add Admin Page Menu page.
	 *
	 * @access public
	 *
	 * @since    1.0.0
	 */
	public function add_admin_menu() {

		$white_label     = frase_plugin_include()->get_white_label();
		$admin_menu_page = isset($white_label['admin_menu_page']) ? $white_label['admin_menu_page'] : null;

		if ($admin_menu_page) {
			add_menu_page(
					$admin_menu_page['page_title'],
					$admin_menu_page['menu_title'],
					'manage_options',
					$admin_menu_page['menu_slug'],
					array( $this, 'display_plugin_setup_page' ),
					$admin_menu_page['icon_url'],
					$admin_menu_page['position']
			);
		}
	}

	/**
	 * Add Root Div For React.
	 *
	 * @access public
	 *
	 * @since    1.0.0
	 */
	public function add_setting_root_div() {
		echo '<div id="' . esc_attr( FRASE_PLUGIN_PLUGIN_NAME ) . '"></div>';
	}

	/**
	 * Register the CSS/JavaScript Resources for the admin area.
	 *
	 * @access public
	 * Use Condition to Load it Only When it is Necessary
	 *
	 * @since    1.0.0
	 */
	public function enqueue_resources() {

		$screen              = get_current_screen();
		$admin_scripts_bases = array(
			'toplevel_page_' . FRASE_PLUGIN_PLUGIN_NAME,
			'post',
			'post-new.php', // Add this line to include the classic editor
      'post.php'      // Add this line to include the classic editor edit screen
		);
		if ( ! ( isset( $screen->base ) && in_array( $screen->base, $admin_scripts_bases, true ) ) ) {
			return;
		}

		/* Atomic CSS */
		wp_enqueue_style( 'atomic' );

		/*Scripts dependency files*/
		$deps_file = FRASE_PLUGIN_PATH . 'build/admin/admin.asset.php';

		/*Fallback dependency array*/
		$dependency = array();
		$version    = FRASE_PLUGIN_VERSION;

		/*Set dependency and version*/
		if ( file_exists( $deps_file ) ) {
			$deps_file  = require $deps_file;
			$dependency = $deps_file['dependencies'];
			$version    = $deps_file['version'];
		}
		// Ensure React and ReactDOM are enqueued
    wp_enqueue_script('react');
    wp_enqueue_script('react-dom');
    wp_enqueue_script('wp-element');

    // Add these lines to enqueue other potential dependencies
    wp_enqueue_script('wp-components');
    wp_enqueue_script('wp-i18n');
    wp_enqueue_script('wp-api-fetch');
		wp_enqueue_script('wp-plugins');
		wp_enqueue_script('wp-data');

    // Enqueue your main script
    wp_enqueue_script( FRASE_PLUGIN_PLUGIN_NAME, FRASE_PLUGIN_URL . 'build/admin/admin.ts.js', array_merge(['react', 'react-dom', 'wp-element', 'wp-components', 'wp-i18n', 'wp-api-fetch', 'wp-data'], $dependency), $version, true );

		wp_enqueue_style( 'google-fonts-open-sans', FRASE_PLUGIN_URL . 'assets/library/fonts/open-sans.css', '', $version );
		wp_enqueue_style( FRASE_PLUGIN_PLUGIN_NAME, FRASE_PLUGIN_URL . 'build/admin/admin.ts.css', array( 'wp-components' ), $version );

		/* Localize */
		$localize = apply_filters(
			'frase_plugin_admin_localize',
			array(
				'version'     => $version,
				'root_id'     => FRASE_PLUGIN_PLUGIN_NAME,
				'nonce'       => wp_create_nonce( 'wp_rest' ),
				'store'       => FRASE_PLUGIN_PLUGIN_NAME,
				'rest_url'    => get_rest_url(),
				'white_label' => frase_plugin_include()->get_white_label(),
			)
		);

		wp_set_script_translations( FRASE_PLUGIN_PLUGIN_NAME, FRASE_PLUGIN_PLUGIN_NAME );
		wp_localize_script( FRASE_PLUGIN_PLUGIN_NAME, 'FrasePluginLocalize', $localize );
	}

	/**
	 * Get settings schema
	 * Schema: http://json-schema.org/draft-04/schema#
	 *
	 * Add your own settings fields here
	 *
	 * @access public
	 *
	 * @since 1.0.0
	 *
	 * @return array settings schema for this plugin.
	 */
	public function get_settings_schema() {
		$setting_properties = apply_filters(
			'frase_plugin_options_properties',
			array(
				/*Settings -> Settings1*/
				'setting1'  => array(
					'type' => 'string',
				),
				'setting2'  => array(
					'type' => 'string',
				),
				/*Settings -> Settings2*/
				'setting3'  => array(
					'type' => 'boolean',
				),
				'setting4'  => array(
					'type' => 'boolean',
				),
				'setting5'  => array(
					'type'              => 'string',
					'sanitize_callback' => 'sanitize_key',
				),
				/*Settings -> Advanced*/
				'deleteAll' => array(
					'type' => 'boolean',
				),
			),
		);

		return array(
			'type'       => 'object',
			'properties' => $setting_properties,
		);
	}

	/**
	 * Register settings.
	 * Common callback function of rest_api_init and admin_init
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function register_settings() {
		$defaults = frase_plugin_default_options();

		register_setting(
			'frase_plugin_settings_group',
			FRASE_PLUGIN_OPTION_NAME,
			array(
				'type'         => 'object',
				'default'      => $defaults,
				'show_in_rest' => array(
					'schema' => $this->get_settings_schema(),
				),
			)
		);
	}

	public function add_meta_box() {
    $post_types = get_post_types(['public' => true]);

    foreach ($post_types as $post_type) {
        // Check if we're using the block editor for this post type
        if (!use_block_editor_for_post_type($post_type)) {
            add_meta_box(
                'frase_meta_box',
                'Frase',
                [$this, 'render_meta_box'],
                $post_type,
                'side',
                'high'
            );
        }
    }
	}

	public function render_meta_box($post) {
		wp_nonce_field(basename(__FILE__), 'frase_meta_box_nonce');
		echo '<div id="frase-meta-box-root"></div>';
	}
}

if ( ! function_exists( 'frase_plugin_admin' ) ) {
	/**
	 * Return instance of  Frase_Admin class
	 *
	 * @since 1.0.0
	 *
	 * @return Frase_Admin
	 */
	function frase_plugin_admin() {//phpcs:ignore
		return Frase_Admin::get_instance();
	}
}
