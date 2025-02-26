<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://alttextgo.com
 * @since      1.0.0
 *
 * @package    ALTGOO
 * @subpackage ALTGOO/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    ALTGOO
 * @subpackage ALTGOO/admin
 * @author     AltTextGo <support@alttextgo.com>
 */
class ALTGOO_Admin {

	/**
	 * The ID of this plugin.
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
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in ALTGOO_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The ALTGOO_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ALTGOO-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in ALTGOO_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The ALTGOO_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ALTGOO-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function enqueue_script_for_image_block_editor() {
		wp_enqueue_script(
			'alt-text-go-image-editor',
			plugin_dir_path( dirname( __FILE__ ) ) . 'js/imageBlock.min.js',
			['react', 'react-jsx-runtime', 'wp-block-editor', 'wp-components', 'wp-compose', 'wp-element', 'wp-hooks', 'wp-primitives'],
			$this->version,
			true
		);
		wp_localize_script(
			'alt-text-go-image-editor', 'altgoo', [
				'has_api_key' => get_option('altgoo_api_key') ? true: false,
				'settings_url' => admin_url() . "admin.php?page=alt-text-go",
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'security_generate_alt_text_single' => wp_create_nonce( 'altgoo_generate_alt_text_single' )
			]
		);
	}
}
