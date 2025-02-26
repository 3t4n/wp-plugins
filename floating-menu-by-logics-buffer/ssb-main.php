<?php


/**
 * Main plugin class
 */

class sm_main {

	/**
	* @var object $ui
	*/

	public $ui;

	public function __construct() {
		// User interfaces object
		$this->ui = new ssb_ui;

		// Plugin text domain
		add_action( 'init', array( $this, 'ssb_textdomain' ) );

		// Icons UI
		add_action( 'wp_footer', array( $this->ui, 'icons' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'ssb_ui_assets' ) );

		//include_once (plugins_url('admin-folder/admin/admin-init.php', __FILE__));

		if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' ) ) {
    		require_once( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' );
		}
		if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/sample/menu-config.php' ) ) {
		    require_once( dirname( __FILE__ ) . '/ReduxFramework/sample/menu-config.php' );
		}

		
		
	}

	/**
	 * Load text domain
	 */

	public function ssb_textdomain() {
		load_plugin_textdomain( 'sticky-side-buttons', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}

	/**
	 * Register settings
	**/

	public function ssb_register_settings() {
		register_setting( 'ssb_storage', 'ssb_settings' );
		register_setting( 'ssb_storage', 'ssb_buttons' );
		register_setting('ssb_storage', 'ssb_showoncpt');
	}

	/**
	 * UI Assets
	 *
	**/

	public function ssb_ui_assets() {

		// CSS
		wp_enqueue_style( 'ssb-ui-style', plugins_url( 'assets/css/ssb-ui-style.css', __FILE__ ) );
		wp_enqueue_style( 'ssb-fontawesome', plugins_url( 'assets/css/font-awesome.css', __FILE__ ) );
		
		// JS
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('ssb-ui-js', plugins_url('assets/js/ssb-ui-js.js', __FILE__ ), array());

		
		
	}

}
