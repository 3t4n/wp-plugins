<?php

namespace QuadLayers\QLTGM\Controllers;

class Welcome {

	protected static $instance;

	private function __construct() {
		add_action( 'admin_menu', array( $this, 'add_menu' ) );
	}

	function add_menu() {
		add_menu_page( QLTGM_PLUGIN_NAME, QLTGM_PLUGIN_NAME, 'edit_posts', QLTGM_DOMAIN, array( $this, 'add_panel' ), plugins_url( '/assets/backend/img/icon.png', QLTGM_PLUGIN_FILE ) );
		add_submenu_page( QLTGM_DOMAIN, esc_html__( 'Welcome', 'quadlayers-telegram-chat' ), esc_html__( 'Welcome', 'quadlayers-telegram-chat' ), 'edit_posts', QLTGM_DOMAIN, array( $this, 'add_panel' ) );
	}

	function add_panel() {
		global $submenu;
		include QLTGM_PLUGIN_DIR . 'lib/view/backend/pages/parts/header.php';
		include QLTGM_PLUGIN_DIR . 'lib/view/backend/pages/welcome.php';
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
}
