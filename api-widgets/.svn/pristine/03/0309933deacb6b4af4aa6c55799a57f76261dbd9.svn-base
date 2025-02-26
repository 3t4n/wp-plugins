<?php
/**
 * Plugin Name: API Widgets
 * Plugin URI:  https://apiwidgets.com/
 * Description: A plugin to easily embed Widgets from apiwidgets.com
 * Author: apiwidgets
 * Version: 1.0.2
 * Text Domain: api-widgets
 * License: GPL2 or later
 * 
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Main Class.
 *
 * @since 1.0.0
 */
final class Api_Widgets {

	/**
	 * @var The one true instance
	 * @since 1.0.0
	 */
	protected static $_instance = null;

	public $version = '1.0.2';

	/**
	 * Main Instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}


	/**
	 * 
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->define_constants();
		$this->hooks();
		$this->includes();
		
		do_action( 'api_widgets_loaded' );
	}

	/**
	 * Define Constants.
	 * @since  1.0.0
	 */
	private function define_constants() {
		$this->define( 'API_WIDGETSDIR',plugin_dir_path( __FILE__ ) );
		$this->define( 'API_WIDGETSURL',plugin_dir_url( __FILE__ ) );
		$this->define( 'API_WIDGETSBASENAME', plugin_basename( __FILE__ ) );
		$this->define( 'API_WIDGETSVERSION', $this->version );
	}

	/**
	 * Define hooks.
	 * @since  1.4.2
	 */
	private function hooks() {
		$plugin_file = API_WIDGETSBASENAME;
		add_filter( "plugin_action_links_{$plugin_file}", array( $this, 'plugin_action_links' ), 10, 4 );
		add_filter( 'plugin_row_meta', array( $this, 'filter_plugin_row_meta' ), 10, 4 );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_block_editor_assets' ) );
	}

	/**
	 * Define constant if not already set.
	 * @since  1.0.0
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}

	/**
	 * Include required files.
	 * @since  1.0.0
	 */
	public function includes() {
		include_once ( API_WIDGETSDIR . '/includes/block-editor/block-editor.php' );
		include_once ( API_WIDGETSDIR . 'includes/class-admin-options.php' );
		include_once ( API_WIDGETSDIR . 'includes/class-enqueues.php' );
		include_once ( API_WIDGETSDIR . 'includes/functions.php' );
	}

	/**
	 * Filters the array of row meta for each plugin in the Plugins list table.
	 *
	 * @param array<int,string> $plugin_meta An array of the plugin row's meta data.
	 * @param string            $plugin_file Path to the plugin file relative to the plugins directory.
	 * @return array<int,string> An array of the plugin row's meta data.
	 */
	function filter_plugin_row_meta( array $plugin_meta, $plugin_file ) {
		if ( 'api-widgets/api-widgets.php' !== $plugin_file ) {
			return $plugin_meta;
		}
		$plugin_meta[] = sprintf(
			'<a href="%1$s">%2$s</a>',
			'https://apiwidgets.com/docs/?utm_campaign=Docs&utm_medium=plugin&utm_source=external',
			esc_html( 'Docs', 'api-widgets' )
		);
		return $plugin_meta;
	}

	/**
	 * Adds items to the plugin's action links on the Plugins listing screen.
	 *
	 * @param array<string,string> $actions     Array of action links.
	 * @param string               $plugin_file Path to the plugin file relative to the plugins directory.
	 * @param mixed[]              $plugin_data An array of plugin data.
	 * @param string               $context     The plugin context.
	 * @return array<string,string> Array of action links.
	 */
	function plugin_action_links( $actions, $plugin_file, $plugin_data, $context ) {
		$new = array(
			'setup' => sprintf(
				'<a href="%s">%s</a>',
				esc_url( admin_url( '/options-general.php?page=api-widgets' ) ),
				esc_html__( 'Setup', 'api-widgets' )
			),
		);
		return array_merge( $new, $actions );
	}

	// Enqueue block editor assets
	function enqueue_block_editor_assets() {
	    wp_enqueue_script(
	        'api-widgets-block-editor',
	        plugin_dir_url(__FILE__) . 'includes/block-editor/index.js',
	        array('wp-blocks', 'wp-element', 'wp-editor'),
	        filemtime(plugin_dir_path(__FILE__) . 'includes/block-editor/index.js'),
	        true
	    );
	}

}


/**
 * Run the plugin.
 */
function Api_Widgets_Start() {
	return Api_Widgets::instance();
}
Api_Widgets_Start();