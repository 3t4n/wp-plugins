<?php

namespace QuadLayers\QLTGM\Models;

class Button extends Base {

	protected $table = 'button';

	function get_args() {
		$args = array(
			'layout'    => 'button',
			'box'       => 'no',
			'position'  => 'bottom-right',
			'text'      => esc_html__( 'How can I help you?', 'quadlayers-telegram-chat' ),
			// 'message' => sprintf(esc_html__('Hello! I\'m testing the %s plugin @https://quadlayers.com', 'quadlayers-telegram-chat'), QLWAPP_PLUGIN_NAME),
			'icon'      => 'qltgm-telegram-icon',
			// 'phone' => '542215677768',
			'username'  => 'username',
			'developer' => 'no',
			'rounded'   => 'yes',
			'timefrom'  => '00:00',
			'timeto'    => '00:00',
			'timedays'  => array(),
			'timezone'  => qltgm_get_current_timezone(),
			'timeout'   => 'readonly',
		);

		return $args;
	}

	function sanitize( $settings ) {
		if ( isset( $settings['layout'] ) ) {
			$settings['layout'] = sanitize_html_class( $settings['layout'] );
		}

		if ( isset( $settings['position'] ) ) {
			$settings['position'] = sanitize_html_class( $settings['position'] );
		}

		if ( isset( $settings['text'] ) ) {
			$settings['text'] = sanitize_text_field( $settings['text'] );
		}

		if ( isset( $settings['username'] ) ) {
			$settings['username'] = sanitize_text_field( $settings['username'] );
		}

		if ( isset( $settings['icon'] ) ) {
			$settings['icon'] = sanitize_html_class( $settings['icon'] );
		}

		return $settings;
	}

	function save( $button_data = null ) {
		return parent::save_data( $this->table, $this->sanitize( $button_data ) );
	}
}
