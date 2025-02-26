<?php
/**
 * Create menus in WP admin.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ACB_Admin_Menus class.
 */
class ACB_Admin_Menus {

	/**
	 * Hook in tabs.
	 */
	public function __construct() {
		// Add menus.
		add_action( 'admin_menu', array( $this, 'admin_menu' ), 9 );
		add_action( 'admin_head', array( $this, 'menu_order_fix' ) );
	}

	/**
	 * Add menu items.
	 */
	public function admin_menu() {
		add_menu_page( esc_html__( 'Ajax Content Browser', 'acb' ), esc_html__( 'ACB', 'acb' ), 'manage_options', 'acb', null, 'dashicons-layout', '827.5471' );

		add_submenu_page( 'acb', esc_html__( 'Ajax Content Browser', 'acb' ), esc_html__( 'About', 'acb' ), 'manage_options', 'acb-about', array( $this, 'load_page' ) );
		add_submenu_page( 'acb', esc_html__( 'ACB &rarr; Shortcode generator', 'acb' ), esc_html__( 'Shortcode generator', 'acb' ), 'manage_options', 'acb-generate', array( $this, 'load_page' ) );
		add_submenu_page( 'acb', esc_html__( 'ACB &rarr; Docs', 'acb' ), esc_html__( 'Docs', 'acb' ), 'manage_options', 'acb-docs', array( $this, 'load_page' ) );
	}

	/**
	 * Init and load page.
	 */
	public function load_page() {
		$data = get_plugin_data( ACB_PLUGIN_FILE );

		$page = esc_attr( $_GET[ 'page'] );
		if ( empty( $page ) ) {
			return;
		}

		$tabs = array(
			'about' 	=> esc_html__( 'About', 'acb' ),
			'generate'  => esc_html__( 'Shortcode generator', 'acb' ),
			'docs'  	=> esc_html__( 'Docs', 'acb' ),
		);

		include_once dirname( __FILE__ ) . '/views/html-admin-' . str_replace( 'acb-', '', $page ) . '.php';
	}

	/**
	 * Removes the parent menu item.
	 */
	public function menu_order_fix() {
		global $submenu;

		if ( isset( $submenu['acb'] ) ) {
			unset( $submenu['acb'][0] );
		}
	}

}

return new ACB_Admin_Menus();