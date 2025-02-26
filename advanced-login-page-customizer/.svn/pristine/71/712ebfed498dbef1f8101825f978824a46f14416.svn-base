<?php
/**
 * File function file.
 */
namespace Advanced_Login_Page_Customizer;

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'advanced_login_page_customizer_recursive_parse_args' ) ) {
	/**
	 * function to parse recursive args.
	 *
	 * @param array $args
	 * @param array $defaults
	 * @return array
	 */
	function advanced_login_page_customizer_recursive_parse_args( $args = array(), $defaults = array() ) {
		$new_args = (array) $defaults;

		foreach ( $args as $key => $value ) {
			if ( is_array( $value ) && isset( $new_args[ $key ] ) ) {
				$new_args[ $key ] = advanced_login_page_customizer_recursive_parse_args( $value, $new_args[ $key ] );
			} else {
				$new_args[ $key ] = $value;
			}
		}
		return $new_args;
	}
}

/**
 * Default login ui settings.
 *
 * @return array
 */
function advanced_login_page_customizer_login_default_settings() {
	return array(
		'settings' => array(
			'auto_remember_me' => false,
			'enable_pci_compliance' => false,
			'remove_language_switcher' => false,
		),
		'styles' => array(
			'logo'       => array(
				'disabled' => false,
				'margin' => array(
					'top' => 0,
					'bottom' => '25px',
				)
			),
			'background' => array(
				'muteVideo' => true,
				'repeat'    => 'repeat',
				'size'      => '',
				'videoSource' => 'media',
			),
		)
	);
}

/**
 * Get login ui settings.
 *
 * @return array
 */
function advanced_login_page_customizer_login_settings() {
	$settings = get_option( 'advanced_login_page_customizer_login_ui_settings', array() );
	$defaults = advanced_login_page_customizer_login_default_settings();
	$settings = advanced_login_page_customizer_recursive_parse_args( $settings, $defaults );
	return $settings;
}

function advanced_login_page_customizer_login_global_settings() {
	$settings = get_option( 'advanced_login_page_customizer_settings', array() );
	$defaults = array(
		'auto_remember_me' => false,
		'enable_pci_compliance' => false,
		'remove_language_switcher' => false,
	);
	$settings = advanced_login_page_customizer_recursive_parse_args( $settings, $defaults );
	return $settings;
}
