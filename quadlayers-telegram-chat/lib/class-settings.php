<?php

namespace QuadLayers\QLTGM;

class Settings {

	protected static $instance;

	private function __construct() {
		add_filter( 'init', array( $this, 'premium_version' ) );
		add_action( 'admin_init', array( $this, 'settings_register' ) );
	}

	// fix required header in license tab
	function settings_header() {
		global $submenu;
		include QLTGM_PLUGIN_DIR . 'lib/view/backend/pages/parts/header.php';
	}

	// fix settings override with defaults on license save
	function settings_sanitize( $qltgm ) {

		$current = get_option( QLTGM_DOMAIN, array() );

		return wp_parse_args( $qltgm, $current );
	}

	// required to save license
	function settings_register() {
		register_setting( sanitize_key( QLTGM_DOMAIN . '-group' ), sanitize_key( QLTGM_DOMAIN ), array( $this, 'settings_sanitize' ) );
	}

	function premium_version() {
		global $qltgm;
		// models
		$model         = new Models\Base();
		$button_model  = new Models\Button();
		$box_model     = new Models\Box();
		$contact_model = new Models\Contact();
		$chat_model    = new Models\Chat();
		$display_model = new Models\Display();
		$scheme_model  = new Models\Scheme();

		// objects
		$qltgm             = $model->options();
		$qltgm['button']   = $button_model->get();
		$qltgm['box']      = $box_model->get();
		$qltgm['contacts'] = $contact_model->get_contacts_reorder();
		$qltgm['chat']     = $chat_model->get();
		$qltgm['display']  = $display_model->get();
		$qltgm['scheme']   = $scheme_model->get();

		if ( ! is_admin() ) {
			/*
			if (isset($qltgm['button']['phone'])) {
			$qltgm['button']['phone'] = qltgm_format_phone($qltgm['button']['phone']);
			} */
			if ( isset( $qltgm['button']['timezone'] ) ) {
				$qltgm['button']['timezone'] = qltgm_get_timezone_offset( $qltgm['button']['timezone'] );
			}
		}

		if ( isset( $qltgm['contacts'] ) ) {
			if ( count( $qltgm['contacts'] ) ) {
				foreach ( $qltgm['contacts'] as $id => $c ) {
					$qltgm['contacts'][ $id ] = wp_parse_args( $c, $contact_model->get_args() );

					if ( ! is_admin() ) {
					/*
					if (!empty($qltgm['contacts'][$id]['phone'])) {
						$qltgm['contacts'][$id]['phone'] = qltgm_format_phone($qltgm['contacts'][$id]['phone']);
						} */
						if ( ! empty( $qltgm['contacts'][ $id ]['timezone'] ) ) {
							$qltgm['contacts'][ $id ]['timezone'] = qltgm_get_timezone_offset( $qltgm['contacts'][ $id ]['timezone'] );
						}
					}
				}
			}
		}
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
}
