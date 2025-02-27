<?php
/**
 * Created by NTC.
 * User: NTC - https://ntcde.com
 * Date: 7/23/2019 - 3:33 PM
 * Project Name: WP Page Loading
 * =========
 * @wordpress-plugin
 * Plugin Name:       WP Page Loading
 * Plugin URI:        http://ntcde.com/wp-page-loading/
 * Description:       10+ layouts - Simple, light and great! Add preloader to your website easily, responsive and retina, full customization, compatible with all major browsers.
 * Version:           1.0.5
 * Author:            NTC
 * Author URI:        http://ntcde.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-loading
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
define( 'WP_PAGE_LOADING_VERSION', '1.0.5' );
define( 'WP_PAGE_LOADING_PATH', plugin_dir_path( __FILE__ ) );
define( 'WP_PAGE_LOADING_URL', plugin_dir_url( __FILE__ ) );

class Wp_Loading_Page {
	protected $helpers;
	protected $wp_loading_page;
	protected $version;

	public function __construct() {
		if ( defined( 'WP_PAGE_LOADING_VERSION' ) ) {
			$this->version = WP_PAGE_LOADING_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'wp-loading-page';
		$this->load_dependencies();

		add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'wp_loading_action_links' ) );

		add_action( 'plugins_loaded', array( $this->get_helpers(), 'wp_loading_load_plugin_textdomain' ) );
		add_action( 'admin_enqueue_scripts', array( $this->get_helpers(), 'wp_loading_admin_enqueue_scripts' ) );

		add_action( 'carbon_fields_register_fields', array( $this->get_helpers(), 'wp_loading_auto_make_field' ) );

		add_action( 'wp_head', array( $this->get_helpers(), 'wp_loading_echo_css' ) );
		add_action( 'wp_head', array( $this->get_helpers(), 'wp_loading_buffer_start' ) );
		add_action( 'wp_footer', array( $this->get_helpers(), 'wp_loading_add_scripts' ) );
		add_action( 'wp_footer', array( $this->get_helpers(), 'wp_loading_buffer_end' ) );

		add_action( 'admin_footer', array( $this->get_helpers(), 'wp_loading_echo_html_preview' ) );

		add_action( 'wp_ajax_wp_loading_get_data_preview', array(
			$this->get_helpers(),
			'wp_loading_get_data_preview'
		) );
		add_action( 'wp_ajax_nopriv_wp_loading_get_data_preview', array(
			$this->get_helpers(),
			'wp_loading_get_data_preview'
		) );

	}

	private function load_dependencies() {
		require_once( WP_PAGE_LOADING_PATH . 'vendor/autoload.php' );
		add_action( 'plugins_loaded', array( 'Carbon_Fields\\Carbon_Fields', 'boot' ) );

		require_once WP_PAGE_LOADING_PATH . 'includes/class-helpers.php';
		$this->helpers = new Helpers( $this->get_plugin_name(), $this->get_version() );
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_version() {
		return $this->version;
	}

	public function get_helpers() {
		return $this->helpers;
	}

	function wp_loading_action_links( $links ) {
		$links = array_merge( array(
			'<a href="' . esc_url( admin_url( '?page=wp_loading_page_options' ) ) . '">' . __( 'Settings', 'wp-loading' ) . '</a>'
		), $links );

		return $links;
	}
}

$wpLoading = new Wp_Loading_Page();
