<?php

namespace QuadLayers\QLTGM\Controllers;

class Scheme extends Base {

	protected static $instance;
	protected $scheme = 'scheme';

	private function __construct() {
		add_action( 'wp_ajax_qltgm_save_scheme', array( $this, 'ajax_qltgm_save_scheme' ) );
		add_action( 'admin_menu', array( $this, 'add_menu' ) );
	}

	function add_menu() {
		add_submenu_page( QLTGM_DOMAIN, esc_html__( 'Colors', 'quadlayers-telegram-chat' ), esc_html__( 'Colors', 'quadlayers-telegram-chat' ), 'manage_options', QLTGM_DOMAIN . '_scheme', array( $this, 'add_panel' ) );
	}

	function add_panel() {
		global $submenu;
		$scheme_model = new \QuadLayers\QLTGM\Models\Scheme();
		$scheme       = $scheme_model->get();
		include QLTGM_PLUGIN_DIR . 'lib/view/backend/pages/parts/header.php';
		include QLTGM_PLUGIN_DIR . 'lib/view/backend/pages/scheme.php';
	}

	public function ajax_qltgm_save_scheme() {
		$scheme_model = new \QuadLayers\QLTGM\Models\Scheme();
		if ( current_user_can( 'manage_options' ) ) {
			if ( check_ajax_referer( 'qltgm_save_scheme', 'nonce', false ) && isset( $_REQUEST['form_data'] ) ) {
				$form_data = array();
				parse_str( $_REQUEST['form_data'], $form_data );
				if ( is_array( $form_data ) ) {
					$scheme_model->save( $form_data );
					return parent::success_save( $form_data );
				}
				return parent::error_reload_page();
			}
			return parent::error_access_denied();
		}
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
}
