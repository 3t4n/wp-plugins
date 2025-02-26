<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    ReachoWooCommerce
 * @subpackage ReachoWooCommerce/admin
 * @author     Reacho <support@reacho.com>
 */
class Reacho_WooCommerce_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		$this->setup_admin();

	}

	public function setup_admin() {
		add_action( 'admin_menu', array( $this, 'reachowc_submenu' ) );

		$this->reachowc_woocommerce_api_keys();

		// This adds the "Settings" link to the Reacho plugin entry on the Installed Plugins page.
		add_filter( 'plugin_action_links_' . REACHO_BASENAME, array( $this, 'plugin_settings_link' ) );
	}

	public function reachowc_woocommerce_api_keys() {
		$raw_input = file_get_contents( 'php://input' );
		$data      = json_decode( $raw_input, true );

		// Sanitize the decoded data recursively
		$data = $this->sanitize_recursive( $data );

		if ( is_array( $data ) && array_key_exists( 'consumer_key', $data ) ) {
			update_option( 'reachowc_consumer_key', sanitize_text_field( $data['consumer_key'] ) );
		}
		if ( is_array( $data ) && array_key_exists( 'consumer_secret', $data ) ) {
			update_option( 'reachowc_consumer_secret', sanitize_text_field( $data['consumer_secret'] ) );
		}
	}

	public function sanitize_recursive( $data ) {
		if ( is_array( $data ) ) {
			foreach ( $data as $key => $value ) {
				$data[ $key ] = $this->sanitize_recursive( $value );
			}
		} elseif ( is_string( $data ) ) {
			$data = sanitize_text_field( $data );
		}

		return $data;
	}

	public function reachowc_submenu() {

		$reacho_settings = new Reacho_WooCommerce_Settings();

		add_submenu_page(
			'woocommerce',
			__( 'Reacho WC', 'reacho-for-woocommerce' ),
			__( 'Reacho WC', 'reacho-for-woocommerce' ),
			'manage_options',
			'reacho-woocommerce',
			array( $reacho_settings, 'reachowc_settings_page' )
		);
	}

	/**
	 * Callback method for "plugin_action_links_{$plugin_file}" hook. By default, this does not include
	 * a "settings" link in the Reacho entry of the Installed Plugins tab. This adds the Settings link.
	 *
	 * @param $links
	 *
	 * @return mixed
	 */
	public function plugin_settings_link( $links ) {
		$settings_link = '<a href="' . REACHO_ADMIN . 'admin.php?page=reacho-woocommerce">Settings</a>';
		if ( ! in_array( $settings_link, $links ) ) {
			array_unshift( $links, $settings_link );
		}

		return $links;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * An instance of this class should be passed to the run() function
		 * defined in Reacho_WooCommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Reacho_WooCommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/reacho-woocommerce-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * An instance of this class should be passed to the run() function
		 * defined in Reacho_WooCommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Reacho_WooCommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$settings_script = $this->plugin_name . '_admin_settings';
		wp_register_script( $settings_script, plugin_dir_url( __FILE__ ) . 'js/reacho-woocommerce.js', array( 'jquery' ), true, true );
		wp_localize_script(
			$settings_script,
			'jsObject',
			array(
				'url'    => admin_url( 'admin-ajax.php' ),
				'apiKey' => ReachoWC()->options->get_reacho_option( 'reachowc_private_api_key' ),
				'nonce'  => wp_create_nonce( 'reachowc_nonce_action' ),
			)
		);
		wp_enqueue_script( $settings_script, plugin_dir_url( __FILE__ ) . 'js/reacho-woocommerce.js', array( 'jquery' ), $this->version, false );
	}
}